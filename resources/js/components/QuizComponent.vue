<template>
  <el-container class="container">
    <div class="question__list m-auto">

      <!-- Отображение вопросов в цикле -->
      <el-card
        class="question__item mb-3"
        v-for="(question, idx) in questions"
        :key="question.id"
        v-show="idx == current"
      >
        <div slot="header">
          <span>{{question.title}}</span>
        </div>
        <div class="d-flex flex-column">

          <!-- Отображение варинтов ответа в цикле -->
          <div v-for="option in question.options" :key="option.id">
            <el-radio
              :label="option.id"
              v-bind:name="'option_' + question.id"
              v-model="selected[idx].selected"
              v-on:change="checkText(!!option.has_text)"
              class="text-wrap mb-3"
            >{{option.title}}
            </el-radio>

            <!-- Проверка есть ли текстовое поле у варинта и он выбран -->
            <el-input
              v-if="hasText && selected[current].selected == option.id"
              v-model="selected[idx].text"
              type="textarea"
              class="mb-3"
            ></el-input>
          </div>
        </div>
        <div class="text-end">
          <el-button type="primary" v-if="current != questions.length - 1" v-on:click="next">Далее</el-button>
          <el-button type="primary" v-if="current == questions.length - 1" v-on:click="finish">Завершить</el-button>
        </div>
      </el-card>

    </div>
  </el-container>
</template>

<script>
  export default {
    name: "QuizComponent",
    data() {
      return {
        questions: [], // вопросы
        selected: [], // выбранные варинты ответа
        current: 0, // текущий вопрос для отображения на странице
        hasText: false // наличие текстового поля
      }
    },
    methods: {
      /**
       * Запрос вопрос с вариантами ответа через api
       */
      getQuestions() {
        axios.get('/api/quiz')
          .then((response) => {
            this.questions = response.data.data;
            this.selected = response.data.data.map(({id}) => ({
              questionId: id,
              selected: 0,
              text: null
            }));
          });
      },

      /**
       * Переключение на следующий вопрос
       */
      next: function () {
        // Если у выбраного варианта есть текстовое поле и оно пустое, отдаем ошибку пользователю
        if (this.hasText && !this.selected[this.current].text) {
          this.$notify.error({
            title: 'Ошибка',
            message: 'Пожалуйста введите текст ответа'
          });
        // Если выбран вариант и нет текстового поля пропусаем дальше
        } else if (this.selected[this.current].selected) {
          this.current++;
        // Если не выбран вариант, отдаем ошибку пользователю
        } else {
          this.$notify.error({
            title: 'Ошибка',
            message: 'Пожалуйста выберите вариант ответа'
          });
        }
      },

      /**
       * Переключение на предыдущий вопрос вопрос
       */
      prev: function () {
        this.current--;
      },

      /**
       * Окончание опроса
       */
      finish: function () {
        axios.post('/api/quiz', this.selected)
          .then(() => {
            this.$notify.success({
              title: 'Спасибо за прохождение опроса',
              message: 'Можете закрыть страницу'
            });
          })
          .catch(() => {
            this.$notify.error({
              title: 'Ошибка отправки на сервер',
              message: 'Пожалуйста повторите позднее'
            });
          });
      },

      /**
       * Проверка на наличие текстового поля при выборе варианта ответа
       * @param hasText
       */
      checkText: function (hasText) {
        this.hasText = hasText;
      }
    },
    created() {
      this.getQuestions();
    }
  }
</script>
