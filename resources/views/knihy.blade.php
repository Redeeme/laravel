@extends('layouts.app')

@section('content')
    <script src="{{ asset('js/app.js') }}" defer></script>
        <div class="obsahClanky">
            <div class="description">
                <h2>ODPORÚČANIA KNIŽIEK</h2>
                <p>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was
                    born
                    and I will give you a complete account of the system, and expound the actual teachings of the great
                    explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids
                    pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure
                    rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or
                    pursues or desires to obtain pain of itself, because it is pain, but because occasionally
                    circumstances
                    occur in which toil and pain can procure him some great pleasure. To take a trivial example, which
                    of us
                    ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has
                    any
                    right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or
                    one
                    who avoids a pain that produces no resultant pleasure?"
                </p>
                @if(Auth::id()==1)
                    <div class="top-buffer">
                    <div class="card-body">
                        <form action="{{route('knihy.add')}}" method=post id="add_book_form">
                            @csrf
                            <div class="form-group">
                                <label for="">Nazov Knihy</label>
                                <label>
                                    <input type="text" class="form-control" name="nazov_knihy"
                                           placeholder="nazov_knihy">
                                </label>
                                <span class="text-danger error-text nazov_knihy_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Autor Knihy</label>
                                <label>
                                    <input type="text" class="form-control" name="autor_knihy"
                                           placeholder="autor_knihy">
                                </label>
                                <span class="text-danger error-text autor_knihy_error"></span>
                            </div>
                            <div class="form-group">
                                <label for="inputCategory">Kategoria</label>
                                <select id="inputCategory" class="form-control" name="kategoria">
                                    <option selected>Choose...</option>
                                    @foreach($book_cat as $category)
                                        <option>{{$category->nazov}}/{{$category->id}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-block btn-success">SAVE</button>
                            </div>
                        </form>
                    </div>
                        <div class="top-buffer">
                    <form action="{{route('knihy.kat.add')}}" method=post id="add_category_form">
                        @csrf
                        <div class="form-group top-buffer">
                            <label for="">Nazov Kategorie</label>
                            <label>
                                <input type="text" class="form-control" name="nazov_kategorie"
                                       placeholder="nazov_kategorie">
                            </label>
                            <span class="text-danger error-text nazov_kategorie_error"></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-block btn-success">SAVE</button>
                        </div>
                    </form>
                @endif
                @foreach($book_cat as $cat)
                                <table class="table table-hover">
                                    <thead>
                                    <th colspan="2">{{$cat->nazov}}</th>
                                    </thead>
                    @foreach($books as $book)

                            <tbody>
                            @if($book->book_cat_id == $cat->id)
                            <tr>
                                <td>{{$book->nazov}}</td>
                                <td>{{$book->autor}}</td>
                            </tr>
                            @endif
                            </tbody>

                    @endforeach
                                </table>
                @endforeach
            </div>
        </div>
@endsection
