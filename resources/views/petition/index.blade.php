@extends('layouts.main')
@section('page_title', 'Petitions')
@section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                         <div class="card card-info">
                    <div class="card-header">
                        Choose Petition Category to create a petition
                    </div>
                    <div class="card-body">

                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Category Name</th>

                                    <th>Date Created</th>
                                    <th>Petition</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                <td> <a href="{{ route('petiton.create', $category->id)}}">{{ $category->category_name}}</a> </td>

                                <td>{{ $category->created_at->format('D, d M, Y') }} /
                                    {{ $category->created_at->diffForHumans() }}</td>

                                <td>{{ $category->petitions()-> count()}} </td>

                                <td>  <a href="{{ route('category.show', $category->id) }}"> <i class="fas fa-eye"></i> View petitions</a> </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-info">
                            <div class="card-header">
                                Add Category
                            </div>
                            <div class="card-body">
                            <form action="{{ route('category.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="category_name">Category</label>
                                    <input type="text" name="category_name" value="{{ old('category_name') }}" id="category_name" class="form-control form-control-sm {{ $errors->has('category_name') ? 'is-invalid' : ''}}">
                                    @error('category_name')
                                    <small class="text-danger">
                                          {{ $message }}
                                    </small>
                                    @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-outline-primary">Add Category</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card card-info mt-3">
                    <div class="card-header">
                        All Petitions
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Date Created
                                    </th>
                                    <th>
                                        Signatures
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                  @forelse ($petitions as $petition)
                                  <tr>
                                       <td> <a href="{{ route('petition.show', $petition->id) }}"> {{ Str::limit($petition->title, 30)}}</a>
                                    </td>
                                    <td>
                                         {{$petition->created_at->format('D, d M Y')}} / {{$petition->created_at->diffForHumans()}}
                                    </td>
                                       <td>

                                        {{ $petition->signatures()->count() }}

                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow=" {{ ($petition->signatures()->count() * 100) / 100}}" style="width:  {{ ($petition->signatures()->count() * 100) / 100}}%" aria-valuemin="0" aria-valuemax="100">
                                             {{ ($petition->signatures()->count() * 100) / 100}} %
                                              </div>

                                       </div>


                                    </td>
                                  </tr>
                        @empty
                          <tr>
                              <td colspan="3" align="center">
                                  No Petition
                              </td>

                          </tr>
                        @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>

@endsection
