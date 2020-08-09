@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{ $category->category_name }}
                </div>
                <div class="card-body">
                @forelse ($category->petitions as $petition)
                <li class="list-group-item">
                    <div class="d-flex flex-row">
                        @if ($petition->petition_image == null)
                            <div class="p-2">
                                <img src="{{ asset('imgs/noimage.png') }}" alt=""  style="width:200px" class="img-thumbnail rounded">
                            </div>
                        @else
                            <div class="p-2">
                                <img src="{{ asset('imgs/petitions/'.$petition->petition_image)}}" alt="" style="width:200px" class="img-thumbnail rounded">
                            </div>
                        @endif
                            <div class="p-2">
                                <a href="{{ route('petition.show', $petition->id)}}">
                                    {{$petition->title}}
                                </a>
                            <div> Signatures: {{ $petition->signatures->count() }}</div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow=" {{ ($petition->signatures()->count() * 100) / 100}}" style="width:  {{ ($petition->signatures()->count() * 100) / 100}}%" aria-valuemin="0" aria-valuemax="100">
                                 {{ ($petition->signatures()->count() * 100) / 100}} %
                                  </div>

                           </div>

                            </div>
                   </div>
                 </li>
                    @empty
                        no Petition yet
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
