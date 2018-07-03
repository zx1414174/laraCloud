<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>
        <div class="content">
            <input v-model="newTodo" v-on:keyup.enter="addTodo">
            <ul>
                <li v-for="todo in todos">
                    <span>@{{ todo.text }}</span>
                    <button v-on:click="removeTodo($index)">X</button>
                </li>
            </ul>
        </div>
    </body>
    <script type="text/javascript" src="{{asset('js/vue/vue.js')}}"></script>
    <script type="text/javascript">
        new Vue({
            el: '.content',
            data: {
                newTodo: '',
                todos: [
                    { text: '新增todos' }
                ]
            },
            methods: {
                addTodo: function () {
                    var text = this.newTodo.trim()
                    if (text) {
                        this.todos.push({ text: text })
                        this.newTodo = ''
                    }
                },
                removeTodo: function (index) {
                    this.todos.splice(index, 1)
                }
            }
        })
    </script>
</html>
