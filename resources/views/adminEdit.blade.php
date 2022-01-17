@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <div class="page_content">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Pridaj novy clanok</div>
                <div class="card-body">
                    <form action="{{route('admin.editBlog',$blog->id)}}" method=post id="add_blog_form">
                        @csrf
                        <div class="form-group">
                            <label for="">Nazov Blogu</label>
                            <label>
                                <input type="text" class="form-control" name="nazov_blogu"
                                       placeholder="nazov_blogu"value="{{$blog->nazov}}">
                            </label>
                            <span class="text-danger error-text nazov_blogu_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Autor Blogu</label>
                            <label>
                                <input type="text" class="form-control" name="autor_blogu"
                                       placeholder="autor_blogu"value="{{$blog->autor}}">
                            </label>
                            <span class="text-danger error-text autor_blogu_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Uvodny obrazok</label>
                            <label>
                                <input type="text" class="form-control" name="uvodny_obrazok"
                                       placeholder="uvodny_obrazok"value="{{$blog->uvodny_obrazok}}">
                            </label>
                            <span class="text-danger error-text uvodny_obrazok_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Uvodny text</label>
                            <label>
                                <input type="text" class="form-control" name="uvodny_text"
                                       placeholder="uvodny_text"value="{{$blog->uvodny_text}}">
                            </label>
                            <span class="text-danger error-text uvodny_text_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="">Obsah Blogu</label>
                            <label>
                                <input type="text" class="form-control"  name="obsah_blogu"
                                       placeholder="obsah_blogu"value="{{$blog->kontent}}">
                            </label>
                            <span class="text-danger error-text obsah_blogu_error"></span>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn-block btn-success">SAVE</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
