
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('example2', require('./components/Example.vue'));
Vue.component('vue-pagination', require('./components/Pagination.vue'));


// const  app = new Vue({
//     el: '#app',
//     data: {
//         books: [],
//         search:'',
//         counter: 0,
//
//         sortKey: 'title',
//
//         reverse: false,
//
//         columns: ['title', 'author', 'author', 'author', 'author', 'author'],
//
//         pagination: {
//             total: 0,
//             per_page: 2,
//             from: 1,
//             to: 0,
//             current_page: 1
//         },
//         offset: 4,
//     },
//     mounted : function() {
//         this.getBooks(this.pagination.current_page);
//     },
//     methods: {
//         sortBy: function(sortKey) {
//             this.reverse = (this.sortKey == sortKey) ? ! this.reverse : false;
//
//             this.sortKey = sortKey;
//         },
//
//         getBooks(page) {
//             var _this = this;
//             $.ajax({
//                 url: '/book/api?page='+page,
//                 success: (response) => {
//                 _this.books = response.data;
//             _this.pagination = response;
//         }
//         });
//         }
//     },
//     computed: {
//         filterBooks: function () {
//             return this.books.filter((book) => {
//                     return book.title.match(this.search);
//         });
//         }
//     }
//
// });