@extends('layout.admin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">edit Item</h1>
    </div>
    <div class="dark shadow">
        <div class="card-body">
                <form action="{{ route('item.update', $item->id) }}" method="post" enctype="multipart/form-data">  
                  @method('patch')  
                  @csrf  
                    <div class="form-group">
                      <input type="name" class="form-control @error('nama') is-invalid @enderror" name="nama" 
                      placeholder="Enter Item" value="{{ $item->nama }}">
                      @error('nama')<div class="invalid-feedback">{{$message}}</div> @enderror
                    </div>
                    <div class="form-group">
                      <textarea name="description" rows="10" class="d-block w-100 form-control" placeholder="Enter Description">{{ $item->description }}</textarea>   
                    </div>
                    <div class="form-group">
                        <label for="lahir">Tanggal dibuat</label>
                        <input type="date" class="form-control" name="date_created" id="Lahir"  
                        placeholder="=Tanggal dibuat" value="{{ $item->date_created }}">
                      </div>
                    <div class="form-group">
                        <select name="artist_id" required class="form-control" value={{$item->artist_id}}>
                            <option value="">Pilih Artist</option>
                            <option value="">none</option>
                            @foreach ($artists as $artist)
                                <option value="{{ $artist->id }}" {{$item->artist_id  == $artist->id  ? 'selected' : ''}}>
                                    {{ $artist->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="museum_id" required class="form-control">
                            <option value="">Pilih museum</option>
                            <option value="">none</option>
                            @foreach ($museums as $museum)
                                <option value="{{ $museum->id }}" {{$item->museum_id  == $museum->id  ? 'selected' : ''}}>
                                    {{ $museum->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <select name="type_id" required class="form-control">
                            <option value="">Pilih type</option>
                            <option value="">none</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{$item->type_id  == $type->id  ? 'selected' : ''}}>
                                    {{ $type->type }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="article_id" required class="form-control">
                            <option value="">Pilih Article</option>
                            <option value="">none</option>
                            @foreach ($articles as $article)
                                <option value="{{ $article->id }}" {{$item->article_id  == $article->id  ? 'selected' : ''}}>
                                    {{ $article->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
            

                    <div class="form-group">
                        <input type="file" name="photo" placeholder="gambar">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        Submit
                    </button>

                    
                </form>
        </div>
    </div>


</div>

@endsection