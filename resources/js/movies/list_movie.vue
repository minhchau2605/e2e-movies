<template>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="col-md-4">
                        <div id="edit_exam_name"><input id="input_exam_name" class="form-control" type="text" value="" style="float: left; width: 50%; margin-right: 10px"></div>
                        <div class="btn btn-primary">Search</div>
                    </div>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </div>
                <div style="width: 60%; padding-left: 10px">
                    <ul>
<!--                        <li class="text-blue"> {{ session('delete_status') }}</li>-->
                    </ul>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th style="width: 3%">ID</th>
                            <th style="width: 10%">Name</th>
                            <th style="width: 10%">Thumbnail</th>
                            <th style="width: 5%">Director</th>
                            <th style="width: 5%">Company</th>
                            <th style="width: 5%">Country</th>
                            <th style="width: 5%">Release Date</th>
                            <th style="width: 5%">Type</th>
                            <th style="width: 4%">Episodes</th>
                            <th style="width: 4%">Update Episode</th>
                            <th style="width: 5%">Length</th>
                            <th style="width: 5%">Quality</th>
                            <th style="width: 5%">Subtitle</th>
                            <th style="width: 5%">View</th>
                            <th style="width: 3%">User Rating</th>
                            <th style="width: 3%">Imdb Score</th>
                            <th style="width: 3%">AW Score</th>
                            <th style="width: 5%">Status</th>
                            <th style="width: 15%">Action</th>
                        </tr>
                        <tr v-for="movie in movies" :key="movie.id">
                            <td>{{ movie.id }}</td>
                            <td>{{ movie.name_movie }}</td>
                            <td><img alt="" style="height: 100px; width: 100px;" :src="movie.thumbnail"></td>
                            <td>{{ movie.director_name }}</td>
                            <td>{{ movie.company_name }}</td>
                            <td>{{ movie.country_name }}</td>
                            <td>{{ movie.release_date }}</td>
                            <td v-if="movie.type == 1">Phim lẻ</td>
                            <td v-else>Phim bộ</td>
                            <td>{{ movie.number_of_episodes }}</td>
                            <td>{{ movie.update_episode }}</td>
                            <td>{{ movie.length }}</td>
                            <td>{{ movie.quality }}</td>
                            <td v-if="movie.subtitle == 1">Phụ đề </td>
                            <td v-else>Thuyết minh</td>
                            <td>{{ movie.view }}</td>
                            <td>{{ movie.user_rating }}</td>
                            <td>{{ movie.imdb_score }}</td>
                            <td>{{ movie.aw_score }}</td>
                            <td>
                                <span v-if="movie.status == 1">Hoàn thành</span>
                                <span v-else>Chưa hoàn thành</span>
                            </td>
                            <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="updateMovieModal"
                                        @click="showUpdateModal(movie)"><i class="fa fa-edit"></i> Edit</button>
                                <form action="#" style="display: inline" method="post">
                                    <input type="hidden" value="#" name="mall_function_id">
                                    <a href="#" onclick="return confirm('Are you sure delete the movie ?')"
                                       class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> Delete
                                    </a>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.box -->
        <!-- Modal Edit Question -->
        <update-movie v-if="modalState" :modal.sync="modalState" v-bind:movie="movie"></update-movie>
    </div>
</template>

<script>
    import updateMovieModal from './update_movie.vue'
    export default {
        data() {
            return {
                domain: 'http://e2e.local',
                movies: [],
                components: {
                    'update-modal': updateMovieModal
                },
                modalState: false,
                movie: null
            }
        },

        methods: {
            listMovie(){
                let uri = this.domain + '/api/admin/movie/list';
                this.axios.get(uri).then(response => {
                    this.movies = response.data.data;
                }).catch(function(error){
                    // console.log(error)
                });
            },
            showUpdateModal(movie){
                this.modalState = true;
                this.movie = movie;
                setTimeout(function () {
                    $('#updateMovieModal').modal('show');
                }, 0)

            }
        },

        mounted(){
            let self = this;
            self.listMovie();
        },
    }
</script>

<style scoped>

</style>
