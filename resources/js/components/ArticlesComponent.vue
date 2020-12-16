<template>
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="">
                        <div class="creat_post text-center mb-2">
                            <button class="btn btn-success" @click="post=!post">Create New Article</button>
                        </div>
                        <div class="post" v-if="post">
                            <form @submit.prevent="addArticle" action="" class="mb-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Title" v-model="article.title">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Body" v-model="article.body"></textarea>
                                </div>
                                <button type="submit" class="btn btn-light btn-block">Save</button>
                            </form>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li :class="[{disabled: !pagination.prev_page_url}]" class="page-item">
                                    <a @click="fetchArticles(pagination.prev_page_url)" class="page-link" href="#">Previous</a>
                                </li>

                                <li class="page-item disabled">
                                    <a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{pagination.last_page }}</a>
                                </li>

                                <li :class="[{disabled: !pagination.next_page_url}]" class="page-item">
                                    <a @click="fetchArticles(pagination.next_page_url)" class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <h3>Articles Listing</h3>
                    <div class="card">
                        <div class="card-body p-3">
                            <div v-for="article in articles" :key="article.id">
                                <h3 class="text-primary">{{ article.title | capitalize}} </h3>
                                <p>{{ article.body }}</p>
                                <button @click="editArticle(article)" class="btn btn-success">Update</button>
                                <!-- <button @click="viewArticle(article.id)" class="btn btn-info">View Article</button> -->
                                <a :href="`articles/article/${article.id}`" class="btn btn-info">View Article</a>
                                <button @click="deleteArticle(article.id)" class="btn btn-danger">Delete</button>
                                <span v-if="article.comments" style="float: right; color: grey" class="text-grey"><span class="fl"> {{ article.comments }} </span><i class="far fa-comment-alt" aria-hidden="true"></i></span>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</template>

<script>
import filter  from '../mixins/filter.js';

export default {
    mixins: [filter],
    // data
    data() {
        return {
            articles: [],
            article: {
                id: '',
                title: '',
                body: '',
                article_id: '',
                user_id : this.userId
            },
            pagination: {},
            edit: false,
            post: false
        }
    },
    // props
    props: {
        userId: {
            type: Number,
        },
        articleRoute: {

        }
    },
    // circle hook
    created() {
        this.fetchArticles();
    },

     // methods
    methods: {
        // fetch method
        fetchArticles(page_url) {
            let vm = this;
            page_url = page_url || '/api/articles'
            fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    console.log(res.data)
                    this.articles = res.data;
                    vm.makePagination(res.meta, res.links);
                })
                .catch(err => console.log(err));
        },
        makePagination(meta, links) {
            let pagination = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                next_page_url: links.next,
                prev_page_url: links.prev
            }

            this.pagination = pagination;
        },
        addArticle(id) {
            if(this.edit === false) {
                // add
                fetch('api/article', {
                    method: 'post',
                    body: JSON.stringify(this.article),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.article.title = '';
                    this.article.body = '';
                    alert('New Article Added');
                    this.fetchArticles();
                    this.post = false;
                })
            }else {
                // update
                fetch('api/article', {
                    method: 'put',
                    body: JSON.stringify(this.article),
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    this.article.title = '';
                    this.article.body = '';
                    this.article.body = '';
                    this.article.article_id = '';
                    this.edit = false;
                    alert('Article Updated');
                    this.fetchArticles();
                })
            }
         },
         editArticle(article) {
             this.edit = true;
             this.post = true;
             this.article.id = article.id;
             this.article.article_id = article.id;
             this.article.title = article.title;
             this.article.body = article.body;
         },
         //  redirect to single view
         viewArticle(id) {
            //  window.location.href = `home/article/${id}`;

         },
        //  delete article
         deleteArticle(id) {
            if(confirm('Are you Sure?')) {
                fetch(`api/article/${id}`, {
                    method: 'delete'
                })
                .then(res => res.json())
                .then(data => {
                    alert('Article Removed');
                    this.fetchArticles();
                })
                .catch(err => console.log(err));
            }
        },
    }

}
</script>
