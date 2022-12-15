
@extends('layouts.layout')
@section('content')
    <section class="cabinet__container">
        <cabinet-root

        ></cabinet-root>
        {{--        <profile></profile>--}}
{{--        <article class="advertisements__container">--}}
{{--            <p class="adv__con__title">Мои объявления</p>--}}
{{--            <div class="advertisement_status_container">--}}
{{--                <div class="exists__status">--}}
{{--                    <p class="adv_status adv_status__active">Размещенные <span class="countAdvert">(передать блейд или вью)</span></p>--}}
{{--                    <p class="adv_status">Черновики</p>--}}
{{--                    <p class="adv_status">История</p>--}}
{{--                </div>--}}
{{--                <a id="createAdd" class="addAdvert">--}}
{{--                    <p class="adv_status adv_status__active" id="goAdd">Добавить объвление</p>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <advertisement-container>--}}
{{----}}
{{--            <router-view></router-view>--}}

{{--            --}}{{--            </advertisement-container>--}}
{{--            <div class="advertisement__container" id="js_advert">--}}
{{--                {{dd($ads)}}--}}

{{--                @foreach($ads as $ad)--}}
{{--                    <div class="advertisement" data-id="{{ $ad->id }}">--}}
{{--                        @foreach($ad->files as $file)--}}
{{--                        <img class="adv_img" src="{{ $file->getUrl() }}" alt="">--}}
{{--                        @endforeach--}}
{{--                        <div class="advertisement__description">--}}
{{--                            <h3 class="ad__title">{{ $ad->title }}</h3>--}}
{{--                            <h4 class="ad__content">{{ $ad->content }}</h4>--}}
{{--                            <div class="location_price">--}}
{{--                                <h5 class="ad__location">{{ $ad->location }}</h5>--}}
{{--                                <h6 class="ad__price">--}}
{{--                                @if($ad->price == 0)--}}
{{--                                    <p class="no__price">Бесплатно</p>--}}
{{--                                @else--}}
{{--                                    <p class="num__price">{{$ad->price}}</p>--}}
{{--                                @endif--}}
{{--                                </h6>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="setting__container">--}}
{{--                            <img src="/images/threeDots.svg" alt="dots">--}}
{{--                            <div class="settingBtns">--}}
{{--                                <a class="redBtn">--}}
{{--                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"--}}
{{--                                         viewBox="0 0 495.339 495.339" style="enable-background:new 0 0 495.339 495.339;" xml:space="preserve">--}}
{{--                                        <path d="M196.299,405.261l277.148-277.124c6.738-6.742,6.738-17.668,0-24.408L374.805,5.056C371.563,1.824,367.176,0,362.598,0--}}
{{--                                            c-4.584,0-8.951,1.824-12.193,5.056L73.256,282.211c-1.871,1.863-3.271,4.121-4.129,6.62L17.76,438.832--}}
{{--                                            c-2.129,6.233-0.498,13.136,4.145,17.789c3.258,3.273,7.649,5.023,12.129,5.04c0.549,1.041,1.369,2.016,2.58,2.856--}}
{{--                                            c8.873,6.191,18.16,10.989,27.627,15.192c44.113,19.555,93.689,18.91,141.607,8.209c36.273-8.121,70.656-22.531,106.008-33.773--}}
{{--                                            c48.125-15.313,100.545-22.667,150.541-28.538c11.065-1.306,9.227-18.468-1.84-17.169c-68.012,8-134.779,21.635-199.277,44.717--}}
{{--                                            c-54.258,19.394-116.512,34.867-172.09,18.005c-11.867-3.588-23.416-8.716-34.514-15.538l135.025-46.232--}}
{{--                                            C192.17,408.527,194.461,407.123,196.299,405.261z M187.508,365.255l-18.32-18.307L418.559,97.656l18.262,18.274L187.508,365.255z--}}
{{--                                             M362.598,41.676l18.303,18.304l-249.34,249.35l-18.307-18.314L362.598,41.676z M91.723,406.445l-19.66-19.652l22.498-65.674--}}
{{--                                            l62.82,62.836L91.723,406.445z"/>--}}
{{--                                    </svg>--}}
{{--                                    <div class="afterStng">--}}
{{--                                        Редактировать--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                                <a class="canBtn">--}}
{{--                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"--}}
{{--                                         viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">--}}
{{--                                        <g>--}}
{{--                                            <g>--}}
{{--                                                <path d="M380.54,83.027h-48.432v-6.919C332.108,34.142,297.966,0,256,0s-76.108,34.142-76.108,76.108v6.919h-48.432--}}
{{--                                                    c-57.226,0-103.784,46.557-103.784,103.784v20.757h29.477L84.829,512h342.343l27.676-304.432h29.477v-20.757--}}
{{--                                                    C484.324,129.584,437.767,83.027,380.54,83.027z M221.405,76.108c0-19.075,15.519-34.595,34.595-34.595--}}
{{--                                                    c19.075,0,34.595,15.519,34.595,34.595v6.919h-69.189V76.108z M389.261,470.487H122.739L98.837,207.568h314.325L389.261,470.487z--}}
{{--                                                     M72.746,166.054c8.567-24.162,31.653-41.514,58.714-41.514h48.432h152.216h48.432c27.061,0,50.147,17.351,58.714,41.514H72.746z"--}}
{{--                                                />--}}
{{--                                            </g>--}}
{{--                                        </g>--}}
{{--                                        <g>--}}
{{--                                            <g>--}}
{{--                                                <rect x="235.243" y="249.081" width="41.514" height="179.892"/>--}}
{{--                                            </g>--}}
{{--                                        </g>--}}
{{--                                        <g>--}}
{{--                                            <g>--}}
{{--                                                <rect x="152.216" y="249.081" width="41.513" height="179.892"/>--}}
{{--                                            </g>--}}
{{--                                        </g>--}}
{{--                                        <g>--}}
{{--                                            <g>--}}
{{--                                                <rect x="318.27" y="249.081" width="41.514" height="179.892"/>--}}
{{--                                            </g>--}}
{{--                                        </g>--}}
{{--                                    </svg>--}}
{{--                                    <div class="afterStng">--}}
{{--                                        Удалить--}}
{{--                                    </div>--}}
{{--                                </a>--}}

{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </article>--}}
    </section>

@endsection


















{{--@extends('layouts.layout')--}}
{{--@section('content')--}}
{{--    <section class="cabinet">--}}
{{--        <aside class="cabinet__menu">--}}
{{--            <header>--}}
{{--                <div class="profile">--}}
{{--                    <div class="avatar">--}}
{{--                        <img src="/images/me.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <p>Dmitry Bublik</p>--}}
{{--                </div>--}}
{{--                <ul class="cabinet__options">--}}
{{--                    <li><a class="cabinet__options_a a_active" href="#" id="products">Мои объявления()</a></li>--}}
{{--                    <li><a class="cabinet__options_a" href="#" id="add__product">Добавить объявление</a></li>--}}
{{--                </ul>--}}
{{--            </header>--}}
{{--        </aside>--}}
{{--        <div class="cabinet__advert">--}}
{{--            <div class="tovar__ads"></div>--}}

{{--            <div class="advert__status" id="tab1">--}}
{{--                <a href=""><h3 class="h3__title h3__active">Мои объявления ({{count($ads)}})</h3>--}}
{{--                </a>--}}
{{--                <a href=""><h3 class="h3__title">Черновики ()</h3></a>--}}
{{--                <a href=""><h3 class="h3__title">История ()</h3></a>--}}
{{--            </div>--}}
{{--            <div class="advert__status" id="tab2">--}}
{{--                <a href=""><h3 class="h3__title h3__active">Добавить объявление</h3></a>--}}
{{--            </div>--}}

{{--            <div class="advertisement__container" id="js_advert">--}}
{{--                @foreach($ads as $ad)--}}
{{--                    <div class="advertisement" data-id="{{ $ad->id }}">--}}
{{--                        @foreach($ad->files as $file)--}}
{{--                        <img class="adv_img" src="{{ $file->getUrl() }}" alt="">--}}
{{--                        @endforeach--}}
{{--                        <div class="advertisement__description">--}}
{{--                            <h3 class="ad__title">{{ $ad->title }}</h3>--}}
{{--                            <h4 class="ad__content">{{ $ad->content }}</h4>--}}
{{--                            <div class="location_price">--}}
{{--                                <h5 class="ad__location">{{ $ad->location }}</h5>--}}
{{--                                <h6 class="ad__price">--}}
{{--                                @if($ad->price == 0)--}}
{{--                                    <p class="no__price">Бесплатно</p>--}}
{{--                                @else--}}
{{--                                    <p class="num__price">{{$ad->price}}</p>--}}
{{--                                @endif--}}
{{--                                </h6>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="function__button">--}}
{{--                            <button class="redaction">Редактировать</button>--}}
{{--                            <button class="delete">Удалить</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}

{{--            <div class="modalBackdrop">--}}
{{--                <div class="ads__redactor">--}}
{{--                    <h3>Редактировать объявление</h3>--}}
{{--                    <div class="image__now">--}}
{{--                        <h4>Картинка сейчас</h4>--}}
{{--                        <img class="img__red" src="" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="files__download">--}}
{{--                        <div class="files__download__button">--}}
{{--                            <input type="file" name="file" id="image" class="upload__img" placeholder="Выберите файл" multiple>--}}
{{--                            <label class="file__label" for="file">Загрузите файл</label>--}}
{{--                        </div>--}}
{{--                        <div class="images__preview"></div>--}}
{{--                    </div>--}}
{{--                    <input type="text" class="red__input title__red" id="title__red" placeholder="Заголовок">--}}
{{--                    <input type="text" class="red__input content__red" id="content__red" placeholder="Описание">--}}
{{--                    <input type="text" class="red__input location__red" id="location__red" placeholder="Расположение">--}}
{{--                    <input type="number" class="red__input price__red" id="price__red" placeholder="Цена">--}}
{{--                    <div class="function__button">--}}
{{--                        <button class="cancel__btn">Отменить</button>--}}
{{--                        <button class="cancel__btn" id="addRedaction">Редактировать</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--            <div class="form_add" id="form">--}}
{{--                <input type="text" class="form_add__inputs" id="title" placeholder="Заголовок">--}}
{{--                <input type="text" class="form_add__inputs" id="content" placeholder="Описание товара">--}}
{{--                <input type="text" class="form_add__inputs" id="location" placeholder="Место">--}}
{{--                <input type="number" class="form_add__inputs" id="price" placeholder="Цена">--}}
{{--                <div class="files__download">--}}
{{--                    <div class="files__download__button">--}}
{{--                        <input type="file" name="file" id="imageAddAdvert" class="upload__img" placeholder="Выберите файл" multiple>--}}
{{--                        <label class="file__label" for="file">Загрузите файл</label>--}}
{{--                    </div>--}}
{{--                    <div class="images__preview"></div>--}}
{{--                </div>--}}
{{--                <div class="addAdv__btn_container">--}}
{{--                    <input class="addAdvert upload__img" name="sendAdd" id="addAdvert">--}}
{{--                    <label for="sendAdd" class="sendAdd">Создать объявление</label>--}}
{{--                </div>--}}


{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endsection--}}
<script>

</script>
