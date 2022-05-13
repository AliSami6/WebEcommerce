<div class="team-members">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Team Members</h2>
            </div>
          </div>
            @foreach($data as $team)
              <div class="col-md-4">
                <div class="team-member">
                  <div class="thumb-container">
                    <img src="/teamimage/{{$team->image}}" alt="">
                    <div class="hover-effect">
                      <div class="hover-content">
                        <ul class="social-icons">
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                          <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="down-content">
                    <h4>{{$team->person_name}}</h4>
                    <span>{{$team->person_title}}</span>
                    <p>{{$team->details}}</p>
                  </div>
                </div>
              </div>
            @endforeach
        </div>
      </div>
    </div>