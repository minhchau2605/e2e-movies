<template>
    <!-- Modal Edit Question -->
    <div class="modal fade" id="editMovieModal" tabindex="-1" role="dialog" aria-labelledby="editMovieModal"
         aria-hidden="true">
        <div class="vertical-alignment-helper">
            <div class="modal-dialog vertical-align-center">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title">Edit Movie</h4>
                    </div>
                    <form>
                        <div id="bodyModal" class="modal-body">
                            <div class="form-group">
                                <label>ID</label>
                                <input type="number" disabled class="form-control" name="movie_id" :value="item.id">
                            </div>
                            <div class="form-group">
                                <label>Movie Name</label>
                                <input type="text" class="form-control" name="name" :value="item.name">
                            </div>
                            <div class="form-group">
                                <label>Thumbnail</label></br>
                                <img v-bind:src="item.thumbnail" alt="" style="height: 100px; width: 100px;">
                                <input type="file" class="form-control" name="thumbnail" value="">
                            </div>
                            <div>
                                <label>Director</label>
                                <select class="form-control" id="director" name="director">
                                    <option id="mrx" value="Mrx">Mr X </option>
                                </select>
                            </div>
                            <div>
                                <label>Company</label>
                                <select class="form-control" id="company" name="company">
                                    <option id="mrx" value="Mrx">Mr X </option>
                                </select>
                            </div>
                            <div>
                                <label>Country</label>
                                <select class="form-control" id="country" name="country">
                                    <option id="usa" value="usa">USA</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Release Date</label>
                                <input type="date" class="form-control" name="" :value="item.release_date">
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <select class="form-control" id="movie_type" name="movie_type">
                                    <option value="1">Phim lẻ</option>
                                    <option value="2">Phim bộ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Number of episodes</label>
                                <input type="number" class="form-control" name="number_of_episodes" :value="item.number_of_episodes">
                            </div>
                            <div class="form-group">
                                <label>Update episode</label>
                                <input type="number" class="form-control" name="update_episode" :value="item.update_episode">
                            </div>
                            <div class="form-group">
                                <label>Length(minutes)</label>
                                <input type="number" class="form-control" name="length" :value="item.length">
                            </div>
                            <div class="form-group">
                                <label>Quality</label>
                                <input type="text" class="form-control" name="quality" :value="item.quality">
                            </div>
                            <div class="form-group">
                                <label>Subtitle</label>
                                <select class="form-control" id="movie_type" name="movie_type">
                                    <option value="1">Phụ đề</option>
                                    <option value="2">Thuyết minh</option>
                                </select>
                                <!--<input type="text" class="form-control" name="subtitle" :value="item.subtitle">-->
                            </div>
                            <div class="form-group">
                                <label>View</label>
                                <input type="number" class="form-control" name="view" :value="item.view">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" id="status" name="status">
                                    :if(
                                    <option value="1">Chưa hoàn thành</option>
                                    <option value="2">Hoàn thành</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>User rating</label>
                                <input type="number" class="form-control" name="user_rating" value="">
                              </div>
                            <div class="form-group">
                                <label>IMDB</label>
                                <input type="number" class="form-control" name="imdb" value="">
                            </div>
                            <div class="form-group">
                                <label>AW</label>
                                <input type="number" class="form-control" name="aw" value="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button id="save" type="button" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                movie: {
                    id: '',
                    movie_name: '',
                    image: '',
                    director: '',
                    company: '',
                    country: '',
                    release_date: '',
                    type: '',
                    number_of_episodes: 0,
                    update_episode: 0,
                    length: 0,
                    quality: '',
                    subtitle: '',
                    view: 0,
                    status: 0,
                    user_rating: 0,
                    imdb_score: 0,
                    aw_score: 0
                },
                errors: [],
                list_movie: []
            }
        },
        props: ['item'],
        mounted() {
            console.log(this.item.name);
        },
        created() {
            this.detailMovie();
        },
        methods: {
            updateMovie(movie) {
                axios.put('admin/movie/' + movie.id, {name: movie.name, price: movie.price})
                    .then(response => {
                        console.log(response.data.result);
                        movie.isEdit = false
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors.name
                    })
            },
        }
    };
</script>
