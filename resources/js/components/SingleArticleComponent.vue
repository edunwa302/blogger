<template>
    <div class="container">
        <div class="mb-3">
            <button @click="backToHome()" class="btn btn-info">Back</button>
        </div>
        <div>
            <div class="card mb-3">
                <!-- <p>{{ articleData }}</p> -->
                <div class="card-header">
                    <strong>Post detail..</strong>
                </div>
                <div class="card-body">
                    <h3 class="card-title text-strong text-primary">{{ articleData.title | capitalize }}</h3>
                    <p class="card-text">{{ articleData.body }}</p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                         Comment
                    </button>
                </div>
            </div>
            <Article>
                <h3>Comments</h3>
             <comments-component :comments-data="commentsData" :user-info="userInfo" @refetchComments="refetchComments($event)" :user="user"/>

            </Article>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">New Comment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form @submit.prevent method="">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text" v-model="comments.comment"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" @click="addComment(articleData.id)" class="btn btn-primary">Send Comment</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
import filter from '../mixins/filter.js'
export default {
    mixins: [filter],
    props: {
        articleData: {

        },
        commentsData: {

        },
        userInfo: {

        },
        user: {

        }
    },

    data() {
        return{
            comments: {
                article_id: this.articleData.id,
                user_id: this.articleData.user_id,
                comment: '',
            }
        }
    },
    // circle hook
    created() {
        // this.fetchArticles(id);
    },

    // methods
    methods: {
        // back to homepage
        backToHome() {
             window.location.href = `/articles`;
        },
        // refresh comment page ones new comment is added
        refeshcomment() {
            window.location.href = `/articles/article/${this.articleData.id}`;
        },
        // addcomment
        addComment(id) {
            // post commen
            axios.post(`/api/article/${id}/comment`, {
                // body: JSON.stringify(this.comments),
                comment: this.comments.comment,
                article_id: this.comments.article_id,
                // comment_id: this.comments.comment_id,
                user_id: this.comments.user_id
            })
            .then(res => {
                this.comments.comment = '',
                console.log(res.data),
                this.refeshcomment()
            })
            .catch(error => {
                console.log(error)
            })
        },
        // refetchComments(id) {
        //     axios.get('articles/article/${id}', {

        //     })
        // }
    }
 }
</script>
