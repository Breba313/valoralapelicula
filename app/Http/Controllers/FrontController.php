<?php

namespace App\Http\Controllers;

use App\valoraciones;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\peliculas;
use Illuminate\Support\Facades\Auth;
use DB;
use Katzgrau\KLogger\Logger;

class FrontController extends Controller
{
    /*
     |--------------------------------------------------------------------------
     | FrontEnd Controller
     |--------------------------------------------------------------------------
     |*/

    private $peliculas;
    private $valoraciones;
    private $promedio_valoraciones;
    private $valoracion_x_usuario;

    public function __construct()
    {
        /* SELECT P.*, COUNT(V.id) AS cantidad_valoraciones, SUM(V.valoracion)/COUNT(V.id) as promedio
        FROM peliculas AS P INNER JOIN valoraciones AS V ON P.id=v.id_pelicula
        GROUP BY (P.id) */
        //  Obtenemos las peliculas
        $this->peliculas = peliculas::all();

        //  Obtenemos la cantidad de valoraciones por pelicula
        /* SELECT P.id, COUNT(V.id) AS cantidad_valoraciones
            FROM peliculas AS P INNER JOIN valoraciones AS V ON P.id=v.id_pelicula
            GROUP BY (P.id)
        */
        $this->valoraciones = DB::select( DB::raw("SELECT P.id, COUNT(V.id) AS cantidad_valoraciones FROM peliculas AS P INNER JOIN valoraciones AS V ON P.id=v.id_pelicula GROUP BY (P.id)"));

        //  Obtenemos el promedio de valoraciones por pelicula
        /* SELECT P.id, SUM(V.valoracion)/COUNT(V.id) as promedio
            FROM peliculas AS P INNER JOIN valoraciones AS V ON P.id=v.id_pelicula
            GROUP BY (P.id)
        */
        $this->promedio_valoraciones = DB::select( DB::raw("SELECT P.id, SUM(V.valoracion)/COUNT(V.id) as promedio FROM peliculas AS P INNER JOIN valoraciones AS V ON P.id=v.id_pelicula GROUP BY (P.id)"));


        //$this->valoracion_x_usuario = DB::select( DB::raw("SELECT P.id, V.valoracion FROM peliculas AS P INNER JOIN valoraciones AS V ON P.id=v.id_pelicula WHERE V.id_user=1"));

    }
    /**
     * Muestra la vista del front-end.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::id();
        //  Obtenemos las valoraciones por pelicula, del cliente
        /* SELECT P.id, V.valoracion
            FROM peliculas AS P INNER JOIN valoraciones AS V ON P.id=v.id_pelicula
            WHERE V.id_user= Auth::id()
        */
        $this->valoracion_x_usuario = DB::table('peliculas')
            ->select('peliculas.id', 'valoraciones.valoracion')
            ->leftjoin('valoraciones', 'peliculas.id' , '=', 'valoraciones.id_pelicula')
            ->where('valoraciones.id_user', '=', $id_user)
            ->get()->toArray();
        $valoraciones = array();

        $i=0;
        foreach ($this->valoracion_x_usuario as $valoracion){
            $value = $valoracion->id."-".$valoracion->valoracion;
            $valoraciones[$i] = $value;
            $i++;
        }

        $this->valoracion_x_usuario = $valoraciones;

        // Mostramos la vista
       return view('front')->with('peliculas', $this->peliculas)->with('valoraciones', $this->valoraciones)->with('promedio_valoraciones', $this->promedio_valoraciones)->with('valoracion_x_usuario', $this->valoracion_x_usuario);
    }

    /**
     * Funcion que crea/actualiza la valoracion de una pelicula
     *
     * @return \Illuminate\Http\Response
     */
    public function postValorar($id, Request $request)
    {
        $data = $request->all();
        // Creamos el registro en el log
        $logger = new Logger(storage_path().'/valoraciones');

        // Obtenemos la valoracion
        if (isset($data['stars-rating_'.$id])){
            $valor = $data['stars-rating_'.$id];
            //  Verificamos si existe un registro de valoracion para esa pelicula
            $valoraciones = valoraciones::where('id_pelicula',$id)->where('id_user', Auth::id())->get();
            if (count($valoraciones) >0){
                $row = valoraciones::where('id_pelicula',$id)->where('id_user', Auth::id())->get();
                $row_valoracion = valoraciones::findOrFail($row[0]->id);
                //  Actualizamos el registro en la base de datos
                if(isset($row_valoracion)){
                    $row_valoracion->valoracion = $valor;
                    $row_valoracion->fecha = Carbon::now();
                    $row_valoracion->save();
                }
                $valorado = $row_valoracion->toArray();
                $logger->info('Datos de la valoracion', $valorado);
            }else {
                //  Creamos el registro en la base de datos
                $row_valoracion= valoraciones::create([
                    'id_pelicula' => $id,
                    'id_user' => Auth::id(),
                    'fecha' => Carbon::now(),
                    'valoracion' => $valor,
                ]);

                $valorado = $row_valoracion->toArray();
                $logger->info('Datos de la valoracion', $valorado);
            }
        }

        return redirect("/");
    }

    /**
     * Funcion que quita la valoracion de una pelicula
     *
     * @return \Illuminate\Http\Response
     */
    public function quitarValor($id)
    {
        // Creamos el registro en el log
        $logger = new Logger(storage_path().'/valoraciones');

        $valoraciones = valoraciones::where('id_pelicula',$id)->where('id_user', Auth::id())->get();
        if (count($valoraciones) >0){
            //  Verificamos si existe un registro de valoracion para esa pelicula
            $row = valoraciones::where('id_pelicula',$id)->where('id_user', Auth::id())->get();
            $row_valoracion = valoraciones::findOrFail($row[0]->id);
            //  Actualizamos el registro en la base de datos
            if(isset($row_valoracion)){
                $row_valoracion->valoracion = 0;
                $row_valoracion->fecha = Carbon::now();
                $row_valoracion->save();
            }
            $valorado = $row_valoracion->toArray();
        }else{
            //  Creamos el registro en la base de datos
            $row_valoracion = valoraciones::create([
                'id_pelicula' => $id,
                'id_user' => Auth::id(),
                'fecha' => Carbon::now(),
                'valoracion' => 0,
            ]);
            $valorado = $row_valoracion->toArray();
        }
        $logger->info('Datos de la valoracion', $valorado);

        return redirect("/");
    }
}
