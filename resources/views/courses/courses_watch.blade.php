@extends('layouts.auth')

@section('title', 'Aula 01 | Cursos X')

@section('content')

<!-- Course Section Begin -->
<section class="course-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="course__video__player">
                    <video id="player" playsinline controls data-poster="{{ asset('/assets/img/video/cooking_online.jpg') }}">
                        <source src="https://www.youtube.com/watch?v=AsMwuNJXY7M" type="video/mp4" />
                        <!-- Captions are optional -->
                        <track kind="captions" label="English captions" src="#" srclang="en" default />
                    </video>
                </div>
                <div class="course__details__episodes">
                    <div class="section-title">
                        <h5>Lista de Aulas</h5>
                    </div>
                    <a href="#">Aula 01</a>
                    <a href="#">Aula 02</a>
                    <a href="#">Aula 03</a>
                    <a href="#">Aula 04</a>
                    <a href="#">Aula 05</a>
                    <a href="#">Aula 06</a>
                    <a href="#">Aula 07</a>
                    <a href="#">Aula 08</a>
                    <a href="#">Aula 09</a>
                    <a href="#">Aula 10</a>
                    <a href="#">Aula 11</a>
                    <a href="#">Aula 12</a>
                    <a href="#">Aula 13</a>
                    <a href="#">Aula 14</a>
                    <a href="#">Aula 15</a>
                    <a href="#">Aula 16</a>
                    <a href="#">Aula 17</a>
                    <a href="#">Aula 18</a>
                    <a href="#">Aula 19</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="course__details__review">
                    <div class="section-title">
                        <h5>Comentarios</h5>
                    </div>
                    <div class="course__review__item">
                        <div class="course__review__item__pic">
                            <img src="/assets/img/undraw_profile_1.svg" alt="">
                        </div>
                        <div class="course__review__item__text bg-dark">
                            <h6>Chris Curry - <span>1 Hour ago</span></h6>
                            <p>whachikan Just noticed that someone categorized this as belonging to the genre
                            "demons" LOL</p>
                        </div>
                    </div>
                </div>
                <div class="course__details__form p-2">
                    <div class="section-title">
                        <h5>Seu Comentario</h5>
                    </div>
                    <form action="#">
                        <textarea placeholder="Seu comentario" class="card "></textarea>
                        <button type="submit" class="bg-primary"><i class="fa fa-location-arrow"></i> Comentar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Course Section End -->
 

@endsection