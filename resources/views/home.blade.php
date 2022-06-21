@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="accordion" id="accordionExample">
            @foreach($data as $date => $items)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-{{explode(':', $date)[count(explode(':', $date)) - 1]}}">
                        <button
                            class="accordion-button"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapse-{{explode(':', $date)[count(explode(':', $date)) - 1]}}"
                            aria-expanded="true"
                            aria-controls="collapse-{{explode(':', $date)[count(explode(':', $date)) - 1]}}"
                        >
                            {{date('d.m.Y H:i:s', strtotime($date))}}
                        </button>
                    </h2>
                    <div
                        id="collapse-{{explode(':', $date)[count(explode(':', $date)) - 1]}}"
                        class="accordion-collapse collapse"
                        aria-labelledby="heading-{{explode(':', $date)[count(explode(':', $date)) - 1]}}"
                        data-bs-parent="#accordionExample"
                    >
                        <div class="accordion-body">
                            @foreach($items as $item)
                                <ul class="border-bottom pb-3">
                                    <li><b>Вопрос</b> - {{$item->question->title}}</li>
                                    <li><b>Вариант</b> - {{$item->option->title}}</li>
                                    @if(isset($item->text))
                                        <li><b>Описание иного варианта ответа</b> - {{$item->text}}</li>
                                    @endif
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
