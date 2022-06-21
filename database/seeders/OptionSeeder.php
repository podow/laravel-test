<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [
            // Варианты к 1 вопросу
            [
                'title' => 'Услуги',
                'has_text' => false,
                'question_id' => 1,
            ],
            [
                'title' => 'Промышленность',
                'has_text' => false,
                'question_id' => 1,
            ],
            [
                'title' => 'Торговля',
                'has_text' => false,
                'question_id' => 1,
            ],
            [
                'title' => 'Сельское хозяйство',
                'has_text' => false,
                'question_id' => 1,
            ],
            [
                'title' => 'Строительство',
                'has_text' => false,
                'question_id' => 1,
            ],
            [
                'title' => 'Иное',
                'has_text' => true,
                'question_id' => 1,
            ],

            // Варианты ко 2 вопросу
            [
                'title' => 'Более 5 лет',
                'has_text' => false,
                'question_id' => 2,
            ],
            [
                'title' => 'Менее 1 года',
                'has_text' => false,
                'question_id' => 2,
            ],
            [
                'title' => 'От 1 года до 5 лет',
                'has_text' => false,
                'question_id' => 2,
            ],
            [
                'title' => 'Затрудняюсь ответить',
                'has_text' => false,
                'question_id' => 2,
            ],

            // Варианты к 3 вопросу
            [
                'title' => 'Обучение персонала',
                'has_text' => false,
                'question_id' => 3,
            ],
            [
                'title' => 'Имущественная поддержка (льготная аренда, выкуп в рассрочку, безвозмездное пользование и т.д.)',
                'has_text' => false,
                'question_id' => 3,
            ],
            [
                'title' => 'Информационно-маркетинговая поддержка',
                'has_text' => false,
                'question_id' => 3,
            ],
            [
                'title' => 'Финансовая поддержка (льготные кредиты, субсидии и т.д.)',
                'has_text' => false,
                'question_id' => 3,
            ],
            [
                'title' => 'Правовая поддержка',
                'has_text' => false,
                'question_id' => 3,
            ],
            [
                'title' => 'Иное',
                'has_text' => true,
                'question_id' => 3,
            ],

            // Варианты к 4 вопросу
            [
                'title' => 'Нет',
                'has_text' => false,
                'question_id' => 4,
            ],
            [
                'title' => 'Да',
                'has_text' => false,
                'question_id' => 4,
            ],

            // Варианты к 5 вопросу
            [
                'title' => 'Большое количество требуемых документов необходимых для получения поддержки не ясность порядка, который необходимо соблюсти при получении поддержки',
                'has_text' => false,
                'question_id' => 5,
            ],
            [
                'title' => 'Длительные сроки получения поддержки',
                'has_text' => false,
                'question_id' => 5,
            ],
            [
                'title' => 'Отсутствие информации о порядке получения поддержки',
                'has_text' => false,
                'question_id' => 5,
            ],
            [
                'title' => 'Не возникало проблем при получении поддержки',
                'has_text' => false,
                'question_id' => 5,
            ],
            [
                'title' => 'Иное',
                'has_text' => true,
                'question_id' => 5,
            ],

            // Варианты к 6 вопросу
            [
                'title' => 'Нет',
                'has_text' => false,
                'question_id' => 6,
            ],
            [
                'title' => 'Да',
                'has_text' => false,
                'question_id' => 6,
            ],
            [
                'title' => 'Иное',
                'has_text' => true,
                'question_id' => 6,
            ],

            // Варианты к 7 вопросу
            [
                'title' => 'Размещение информации на сайтах государственных органов власти и местного самоуправления',
                'has_text' => false,
                'question_id' => 7,
            ],
            [
                'title' => 'Через организации, образующие инфраструктуру поддержки субъектов малого и среднего предпринимательства',
                'has_text' => false,
                'question_id' => 7,
            ],
            [
                'title' => 'Информационные брошюры, размещение информации в социальных сетях',
                'has_text' => false,
                'question_id' => 7,
            ],
            [
                'title' => 'Проведение круглых столов с участием государственных органов власти, местного самоуправления и бизнеса по вопросам имущественной поддержки',
                'has_text' => false,
                'question_id' => 7,
            ],
            [
                'title' => 'Размещение информации на информационных стендах органов власти, в МФЦ СМИ (в т. ч. периодические печатные издания, телевидение)',
                'has_text' => false,
                'question_id' => 7,
            ],
            [
                'title' => 'Иное',
                'has_text' => true,
                'question_id' => 7,
            ],

            // Варианты к 8 вопросу
            [
                'title' => 'Да',
                'has_text' => false,
                'question_id' => 8,
            ],
            [
                'title' => 'Нет',
                'has_text' => false,
                'question_id' => 8,
            ],
            [
                'title' => 'Иное',
                'has_text' => true,
                'question_id' => 8,
            ],

            // Варианты к 9 вопросу
            [
                'title' => 'На праве собственности',
                'has_text' => false,
                'question_id' => 9,
            ],
            [
                'title' => 'На праве аренды',
                'has_text' => false,
                'question_id' => 9,
            ],
            [
                'title' => 'На ином виде права',
                'has_text' => false,
                'question_id' => 9,
            ],
            [
                'title' => 'Не использую имущество',
                'has_text' => false,
                'question_id' => 9,
            ],

            // Варианты к 10 вопросу
            [
                'title' => 'Высокий уровень затрат на текущее содержание имущества (коммунальные расходы, ремонт и иные платежи)',
                'has_text' => false,
                'question_id' => 10,
            ],
            [
                'title' => 'Высокий размер налога на имущество',
                'has_text' => false,
                'question_id' => 10,
            ],
            [
                'title' => 'Высокий размер арендной платы',
                'has_text' => false,
                'question_id' => 10,
            ],
            [
                'title' => 'Иное',
                'has_text' => true,
                'question_id' => 10,
            ],

            // Варианты к 11 вопросу
            [
                'title' => 'Движимое имущество (машины, оборудование и прочее)',
                'has_text' => false,
                'question_id' => 11,
            ],
            [
                'title' => 'Производственные здания, помещения',
                'has_text' => false,
                'question_id' => 11,
            ],
            [
                'title' => 'Земельные участки',
                'has_text' => false,
                'question_id' => 11,
            ],
            [
                'title' => 'Коворкинги, лофты',
                'has_text' => false,
                'question_id' => 11,
            ],
            [
                'title' => 'Иное',
                'has_text' => true,
                'question_id' => 11,
            ],

            // Варианты к 12 вопросу
            [
                'title' => 'Да',
                'has_text' => false,
                'question_id' => 12,
            ],
            [
                'title' => 'Нет',
                'has_text' => false,
                'question_id' => 12,
            ],
            [
                'title' => 'Иное',
                'has_text' => true,
                'question_id' => 12,
            ],
        ];

        foreach ($options as $option) {
            DB::table('options')->insert([
                'title' => $option['title'],
                'question_id' => $option['question_id'],
                'has_text' => $option['has_text'],
            ]);
        }
    }
}
