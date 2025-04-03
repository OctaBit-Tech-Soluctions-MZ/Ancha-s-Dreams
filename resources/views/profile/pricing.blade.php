@extends('layouts.profile')

@section('title', 'Planos | '.Auth::user()->name)

@section('profile-content')

<div class="panel card shadow border border-0">
    <div class="panel-body bio-graph-info p-3">
        <section class="plans__container">
            <div class="plans">
              <div class="planItem__container row">
          
                  
                <!--pro plan starts -->
                <div class="planItem planItem--pro card shadow border border-0 col-sm-6">
                  <div class="card border border-0">
                    <div class="d-flex gap-1 align-items-center">
                      <div class="card__icon symbol"></div>
                      <h2>Pro</h2>
                      <div class="card__label label">Best Value</div>
                    </div>
                    <div class="card__desc">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</div>
                  </div>
          
                  <div class="price">$18<span>/ month</span></div>
          
                  <ul class="featureList">
                    <li>2 links</li>
                    <li>Own analytics platform</li>
                    <li>Chat support</li>
                    <li class="disabled">Mobile application</li>
                    <li class="disabled">Unlimited users</li>
                  </ul>
          
                  <button class="button button--pink">Get Started</button>
                </div>
                <!--pro plan ends -->
          
                
              </div>
            </div>
          </section>
          <!-- partial -->
          
    </div>
</div>


@endsection