@extends('layouts.main')
@section('content')
       <div class="row">
           <div class="col-8">
               <div class="card">
                   <div class="card-header">
                       <div class="card-tools float-right"> <a href="/petition">Petitions</a> </div>
                       {{ $petition->title }}
                   </div>
                   @if ($petition->petition_image == null)
                <img src="{{ asset('imgs/noimage.png') }}" alt="" srcset="">
                   @else
                    <img src="{{asset('imgs/petitions/'.$petition->petition_image)}}" class="img-responsive" alt="">
                   @endif
               <div class="card-body">
                       {!! $petition->purpose !!}
                   </div>

                   <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h5>Signatures</h5>
                               </div>
                        </div>
                       <div class="card-body">
                          <ul class="list-unstyled">
                            @forelse ($petition->signatures as $signs)
                            <li class="media mb-2">
                                <img class="mr-3" src="{{ asset('imgs/man.png')}}" style="width: 32px" alt="sign" class="img-responsive">
                                <div class="media-body">
                                <h5 class="mt-0">
                                        {{$signs->firstname}} {{$signs->lastname}} </h5>
                                    <small>
                                   says {!!$signs->comment!!}  signs {{ $signs->created_at->diffForHumans() }}
                                    </small>
                                </div>
                            </li>
                        @empty
                            No signatures Yet
                        @endforelse
                          </ul>
                       </div>
                   </div>



               </div>

           </div>
           <div class="col-4">
               <div class="card">
                   <div class="card-header">
                       Sign this Petition
                   </div>
                   <div class="card-body">
                   <form action="{{ route('signature.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="firstname" id="" class="form-control form-control-sm" placeholder="Firstname">
                            </div>
                        <input type="hidden" name="petition_id" value="{{ $petition->id}} ">
                            <div class="form-group">
                                <input type="text" name="lastname" id="" class="form-control form-control-sm" placeholder="lastname">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-sm" placeholder="Email" id="">
                            </div>
                            <div class="form-group">
                                <textarea name="comment" id="" cols="30" rows="10" class="form-control form-control-sm"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-md btn-block btn-round btn-info">Sign this Petition</button>
                            </div>
                        </form>
                   </div>
               </div>
           </div>
       </div>
  @endsection
