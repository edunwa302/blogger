<template>
    <div class="container">
        <section>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li :class="[{disabled: !pagination.prev_page_url}]" class="page-item">
                            <a @click="fetchComments(pagination.prev_page_url)" class="page-link" href="#">Previous</a>
                        </li>

                        <li class="page-item disabled">
                            <a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{pagination.last_page }}</a>
                        </li>

                        <li :class="[{disabled: !pagination.next_page_url}]" class="page-item">
                            <a @click="fetchComments(pagination.next_page_url)" class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </section>
        <section>
           <div v-if="Comments.length">
                <div class="card w-75 mb-1" v-for="comment in Comments" :key="comment.id">
                    <div class="card-body">
                        <h5 class="card-title">{{ comment.comment | capitalize }} </h5>
                        <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                        <button @click="addLikes(comment.id, 'like', comment.article_id)" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="you can only like one's">
                            like <span class="badge badge-light">{{ comment.likes }}</span></button>
                        <a @click="addLikes(comment.id, 'unlike', comment.article_id)" class="btn btn-danger">dislike </a>
                        <div class="border-top mt-1">
                            <p class="text-strong text center"><span><i class="fas fa-user-circle"></i></span> {{ userInfo.name }} </p>
                            <p class="pt-0">Date: {{ comment.created_at }}</p>
                        </div>
                    </div>
                </div>
           </div>
            <div v-else  class="no-comment">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Oh Sorry!</h4>
                    <p>Please, This post has no comment yet, you can drop ur comment by clicking <button type="button" class="btn btn-info" data-toggle="modal" data-target="#staticBackdrop">
                         Here
                    </button></p>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import filter  from '../mixins/filter.js';
export default {
    mixins: [ filter ],

    data() {
        return {
            Comments: [],
            pagination: {},
            articleId: ''
        }
    },
    props: {
        commentsData: {

        },
        userInfo: {

        },
    },
    // filters: {
    //     // Create our number formatter.
    //     priceFormated: value => {
    //         if (!value) return ''
    //         let formatter = new Intl.NumberFormat('en-NG', {
    //             style: 'currency',
    //             currency: 'NGN',
    //         });
    //         return formatter.format(value)
    //     },
    //     //  capitalize
    //     capitalize(value) {
    //         if (!value) return ''
    //         value = value.toString()
    //         return value.charAt(0).toUpperCase() + value.slice(1)
    //     },
    //     // timestamp
    //     timestmap(value) {
    //         // getting data (timestamp) from cloud firestore
    //         if (!value) return ''
    //         let date = value.toDate();
    //         return date.toDateString();
    //         let shortTime = date.toLocaleTimeString();
    //     },
    //     phoneNumber(value) {
    //         if (!value) return ''
    //         let str = +234;
    //         return value.replace(str, 0)
    //     }
    // },
    // computed property
    created() {
        this.articleId = location.pathname.split('/')[3];

    },

    mounted() {
        this.fetchComments()
    },

    // method
    methods: {
        // fetch cmment data
        fetchComments(page_url) {
            let vm = this;
            page_url = page_url || `/api/article/${this.articleId}`;
            fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    console.log(res.meta)
                    vm.Comments = res.data;
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

        // like method
        addLikes(id, voteType, articleId) {
            // likes
            axios.put(`/api/article/${id}/like`, {
                comment_id: id,
                type: voteType,
                user_id: this.userInfo.id

            })
            // .then(res => (console.log(res.data)))
            .then(res => {
                console.log(res.data)
                // this.$emit('refetchComments', )
                window.location.href = `/articles/article/${articleId}`;

            })
            .catch(error => {
                console.log(error)
            })
        },
        addunLikes(id, voteType, articleId) {
            // likes
            axios.post(`/api/article/${id}/like`, {
                comment_id: id,
                type: voteType,
                user_id: this.userInfo.id
            })
            // .then(res => (console.log(res.data)))
            .then(res => {
                console.log(res.data),
                window.location.href = `/articles/article/${articleId}`;

            })
            .catch(error => {
                console.log(error)
            })
        }
    },

}
</script>
