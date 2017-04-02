@extends('layouts.app')

@section('content')

    <div class="slider">
        <div class="callbacks_container">
            <ul class="rslides" id="slider">
                <li><img src="images/banner.jpg" class="img-responsive" alt=""/>
                    <div class="button">
                        <a href="#" class="hvr-shutter-out-horizontal">Watch Now</a>
                    </div>
                </li>
                <li><img src="images/banner1.jpg" class="img-responsive" alt=""/>
                    <div class="button">
                        <a href="#" class="hvr-shutter-out-horizontal">Watch Now</a>
                    </div>
                </li>
                <li><img src="images/banner2.jpg" class="img-responsive" alt=""/>
                    <div class="button">
                        <a href="#" class="hvr-shutter-out-horizontal">Watch Now</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="banner_desc">
            <div class="col-md-9">
                <ul class="list_1">
                    <li>Published <span class="m_1">Feb 20, 2015</span></li>
                    <li>Updated <span class="m_1">Feb 20 2015</span></li>
                    <li>Rating <span class="m_1"><img src="images/rating.png" alt=""/></span></li>
                </ul>
            </div>
            <div class="col-md-3 grid_1">
                <ul class="list_1 list_2">
                    <li><i class="icon1"> </i><p>2,548</p></li>
                    <li><i class="icon2"> </i><p>215</p></li>
                    <li><i class="icon3"> </i><p>546</p></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="box_1">
            <h1 class="m_2">Peiculas recientes</h1>
            <div class="clearfix"> </div>
        </div>
        <div class="box_2">
            <table id="DataTables" class="table table-striped table-hover no-margin responsive" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th><i class="fa fa-file-movie-o"></i> Titulo</th>
                    <th>Categoria</th>
                    <th><i class="fa fa-download"></i> Cantidad de Valoraciones</th>
                    <th><i class="fa fa-comments"></i> Promedio de Valoraciones</th>
                    @if (Auth::guest())
                    @else
                        <th><i class="fa fa-comment"></i> Tu Valoración</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($peliculas as $peli)
                    <tr>
                        <td>{{ $peli->id }}</td>
                        <td><a  href="#">{{ $peli->titulo}}</a></td>
                        <td>{{ $peli->categoria }}</td>
                        <td align="center">
                            @foreach($valoraciones as $valoracion)
                                @if ($peli->id == $valoracion->id)
                                    {{ $valoracion->cantidad_valoraciones }}
                                @endif
                            @endforeach
                        </td>
                        <td align="center">
                            @foreach($promedio_valoraciones as $promedio)
                                @if ($peli->id == $promedio->id)
                                    {{ number_format($promedio->promedio,2) }}
                                @endif
                            @endforeach
                        </td>

                        @if (Auth::guest())
                        @else
                            <td align="center">
                                <form id="valorar-form" action="{{ url('/valorar/') }}/{{ $peli->id }}" class="sky-form" align="left" method="POST">
                                    {{ csrf_field() }}


                                    <section>
                                        <div class="rating">
                                                <input type="radio" name="stars-rating_{{ $peli->id }}" value="10" id="stars-rating-10_{{ $peli->id }}" @if (in_array($peli->id."-10", $valoracion_x_usuario)) checked @endif>
                                                <label for="stars-rating-10_{{ $peli->id }}"><i class="icon-star"></i></label>

                                                <input type="radio" name="stars-rating_{{ $peli->id }}" value="9" id="stars-rating-9_{{ $peli->id }}" @if (in_array($peli->id."-9", $valoracion_x_usuario)) checked @endif>
                                                <label for="stars-rating-9_{{ $peli->id }}"><i class="icon-star"></i></label>

                                                <input type="radio" name="stars-rating_{{ $peli->id }}" value="8" id="stars-rating-8_{{ $peli->id }}" @if (in_array($peli->id."-8", $valoracion_x_usuario)) checked @endif>
                                                <label for="stars-rating-8_{{ $peli->id }}"><i class="icon-star"></i></label>

                                                <input type="radio" name="stars-rating_{{ $peli->id }}" value="7" id="stars-rating-7_{{ $peli->id }}" @if (in_array($peli->id."-7", $valoracion_x_usuario)) checked @endif>
                                                <label for="stars-rating-7_{{ $peli->id }}"><i class="icon-star"></i></label>

                                                <input type="radio" name="stars-rating_{{ $peli->id }}" value="6" id="stars-rating-6_{{ $peli->id }}" @if (in_array($peli->id."-6", $valoracion_x_usuario)) checked @endif>
                                                <label for="stars-rating-6_{{ $peli->id }}"><i class="icon-star"></i></label>

                                                <input type="radio" name="stars-rating_{{ $peli->id }}" value="5" id="stars-rating-5_{{ $peli->id }}" @if (in_array($peli->id."-5", $valoracion_x_usuario)) checked @endif>
                                                <label for="stars-rating-5_{{ $peli->id }}"><i class="icon-star"></i></label>

                                                <input type="radio" name="stars-rating_{{ $peli->id }}" value="4" id="stars-rating-4_{{ $peli->id }}" @if (in_array($peli->id."-4", $valoracion_x_usuario)) checked @endif>
                                                <label for="stars-rating-4_{{ $peli->id }}"><i class="icon-star"></i></label>

                                                <input type="radio" name="stars-rating_{{ $peli->id }}" value="3" id="stars-rating-3_{{ $peli->id }}" @if (in_array($peli->id."-3", $valoracion_x_usuario)) checked @endif>
                                                <label for="stars-rating-3_{{ $peli->id }}"><i class="icon-star"></i></label>

                                                <input type="radio" name="stars-rating_{{ $peli->id }}" value="2" id="stars-rating-2_{{ $peli->id }}" @if (in_array($peli->id."-2", $valoracion_x_usuario)) checked @endif>
                                                <label for="stars-rating-2_{{ $peli->id }}"><i class="icon-star"></i></label>

                                                <input type="radio" name="stars-rating_{{ $peli->id }}" value="1" id="stars-rating-1_{{ $peli->id }}" @if (in_array($peli->id."-1", $valoracion_x_usuario)) checked @endif>
                                                <label for="stars-rating-1_{{ $peli->id }}"><i class="icon-star"></i></label>
                                            </div>

                                    </section>
                                    <div class="rating">
                                        <button class="btn btn-xs btn-danger" type="submit" title="Guardar Valoracion"><i class="fa fa-save"></i></button>
                                        <a class="btn btn-xs btn-primary" title="Valorar en Cero (0)"  href="{{ url('/quitarValor/') }}/{{ $peli->id }}"><i class="fa fa-times-circle"></i></a>
                                    </div>

                                </form>

                            </td>
                        @endif
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('custom_jscripts')
    <script>
        //  Funcion de configuracion del DataTable
        $(document).ready(function() {
            $('#DataTables').DataTable( {
                "order": [[ 0, "asc" ]],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                }
            } );


        } );
    </script>
@stop
