<template>
  <el-container class="container">
    <div class="question__list m-auto">

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
          <div v-for="option in question.options" :key="option.id">
            <el-radio
              :label="option.id"
              v-bind:name="'option_' + question.id"
              v-model="selected[idx].selected"
              v-on:change="checkText(!!option.has_text)"
              class="text-wrap mb-3"
            >{{option.title}}
            </el-radio>
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
        questions: [],
        selected: [],
        current: 0,
        hasText: false
      }
    },
    methods: {
      getQuestions() {
        axios.get('/api/question')
          .then((response) => {
            this.questions = response.data.data;
            this.selected = response.data.data.map(({id}) => ({
              questionId: id,
              selected: 0,
              text: null
            }));
          });
      },
      next: function () {
        if (this.hasText && !this.selected[this.current].text) {
          this.$notify.error({
            title: 'Ошибка',
            message: 'Пожалуйста введите текст ответа'
          });
        } else if (this.selected[this.current].selected) {
          this.current++;
        } else {
          this.$notify.error({
            title: 'Ошибка',
            message: 'Пожалуйста выберите вариант ответа'
          });
        }
      },
      prev: function () {
        this.current--;
      },
      finish: function () {
        console.log('done!');
      },
      checkText: function (hasText) {
        this.hasText = hasText;
      }
    },
    created() {
      this.getQuestions();
    }
  }
</script>
