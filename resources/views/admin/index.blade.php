@extends('layouts.master')
@section('content')
   <div @class(['row','row-cols-4','widgets'])>
    <div @class('col')>
      <div @class(['card'])>
        <div @class(['card-body','p-2','widget-user'])>
          <div @class(['d-flex','justify-content-between'])>
            <h5>Utilisateurs</h5>
            <h4>{{ $user_count }}</h4>
          </div>
          <a href=""> voir plus</a>
        </div>
      </div>
    </div>
    <div @class('col')>
      <div @class(['card'])>
        <div @class(['card-body','p-2','widget-user'])>
          <div @class(['d-flex','justify-content-between'])>
            <h5>Transports</h5>
            <h4></h4>
          </div>
          <a href=""> voir plus</a>
        </div>
      </div>
    </div>
    <div @class('col')>
      <div @class(['card'])>
        <div @class(['card-body','p-2','widget-user'])>
          <div @class(['d-flex','justify-content-between'])>
            <h5>Chauffeurs</h5>
            <h4></h4>
          </div>
          <a href=""> voir plus</a>
        </div>
      </div>
    </div>
    <div @class('col')>
      <div @class(['card'])>
        <div @class(['card-body','p-2','widget-user'])>
          <div @class(['d-flex','justify-content-between'])>
            <h5>Reservations</h5>
            <h4>{{ $reservation_count }}</h4>
          </div>
          <a href=""> voir plus</a>
        </div>
      </div>
    </div>


   </div>
    <div @class(['row','row-cols-2'])>
      <div @class(['col'])>
        <div @class('card')>
          <div @class(['card-body','p-2'])>
            <h5 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
              Statitique d'Utilisateurs
            </h5>
            <canvas id="BarUsers"></canvas>
          </div>
        </div>
      </div>
      <div @class(['col'])>
        <div @class('card')>
          <div @class(['card-body','p-2'])>
            <h5 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
              Statitique du Transports
            </h5>
            <canvas id="BarTransports"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div @class(['row','row-cols-2'])>
      <div @class(['col'])>
        <div @class('card')>
          <div @class(['card-body','p-2'])>
            <h5 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
              Statitique du chauffeurs
            </h5>
              <canvas id="BarChauffeurs"></canvas>
          </div>
        </div>
      </div>
      <div @class(['col'])>
        <div @class('card')>
          <div @class(['card-body','p-2'])>
            <h5 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
              Statitique du Reservations
            </h5>
            <canvas id="BarReservations"></canvas>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('script')
<script>
  // Chart Utilisateurs
  $(function(){
    var data_user = <?php echo json_encode($data_user); ?>;
    var BarUser = $("#BarUsers")
    var BarUser = new Chart(BarUser,{
      type:'bar',
      data:{
        labels:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
        datasets:[{
          label:'Nombre d\'utilisateurs',
          data:data_user,
          backgroundColor:['#F2A60A','#F2A60A','#F2A60A','#F2A60A','#F2A60A','#F2A60A','#F2A60A','#F2A60A','#F2A60A','#F2A60A','#F2A60A','#F2A60A'],
          borderWidth:0.5,
        }
      ]
      },
      options:{
        scales:{
          yAxes:[{
            ticks:{
              beginAtZero:true
            }
          }]
        }
      }
    });
  });


  // Chart Transports


  // Chart Chauffeurs


  // Chart reservations
  $(function(){
    var data_reservation = <?php echo json_encode($data_reservation); ?>;
    var valid_data_reservation = <?php echo json_encode($valid_data_reservation); ?>;
    var BarReservation = $("#BarReservations")
    var BarReservation = new Chart(BarReservation,{
      type:'bar',
      data:{
        labels:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
        datasets:[{
          label:'Nombre du reservations',
          data:data_reservation,
          backgroundColor:['#145DA0','#145DA0','#145DA0','#145DA0','#145DA0','#145DA0','#145DA0','#145DA0','#145DA0','#145DA0','#145DA0','#145DA0'],
          borderWidth:0.5,
        },
        {
          label:'Nombre du reservat',
          data:valid_data_reservation,
          backgroundColor:['red','red','red','red','red','red','red','red','red','red','red','red'],
          borderWidth:0.5,

        },
      ]
      },
      options:{
        scales:{
          yAxes:[{
            ticks:{
              beginAtZero:true
            }
          }]
        }
      }
    });
  })

</script>
@endsection