@extends('Admin.layout.main')
@section('page-title','Thống kê')
@section('title','Thống kê')
@section('content')
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Danh mục bài viết</div>
                    <div class="card-body">
                        <h5 class="card-title">{{$category}}</h5>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header">Bài viết</div>
                    <div class="card-body">
                        <h5 class="card-title">{{$post}}</h5>

                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-header">Tổng User</div>
                    <div class="card-body">
                        <h5 class="card-title">{{$user}}</h5>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header">Bình luận</div>
                    <div class="card-body">
                        <h5 class="card-title">{{$comment}}</h5>

                    </div>
                </div>
            </div>
        </div>
        <!-- end analytic  -->


        <section class="col-lg-12 connectedSortable ui-sortable">
            <!-- Calendar -->
{{--            <div class="card bg-gradient-success" style="position: relative; left: 0px; top: 0px;">--}}
{{--                <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">--}}

{{--                    <h3 class="card-title">--}}
{{--                        <i class="far fa-calendar-alt"></i>--}}
{{--                       Lịch--}}
{{--                    </h3>--}}
{{--                    <!-- tools card -->--}}
{{--                    <div class="card-tools">--}}
{{--                        <!-- button with a dropdown -->--}}

{{--                        <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">--}}
{{--                            <i class="fas fa-minus"></i>--}}
{{--                        </button>--}}
{{--                        <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">--}}
{{--                            <i class="fas fa-times"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                    <!-- /. tools -->--}}
{{--                </div>--}}
{{--                <!-- /.card-header -->--}}
{{--                <div class="card-body pt-0">--}}
{{--                    <!--The calendar -->--}}
{{--                    <div id="calendar" style="width: 100%"><div class="bootstrap-datetimepicker-widget usetwentyfour"><ul class="list-unstyled"><li class="show"><div class="datepicker"><div class="datepicker-days" style=""><table class="table table-sm"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Month"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">February 2021</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td data-action="selectDay" data-day="01/31/2021" class="day old weekend">31</td><td data-action="selectDay" data-day="02/01/2021" class="day">1</td><td data-action="selectDay" data-day="02/02/2021" class="day">2</td><td data-action="selectDay" data-day="02/03/2021" class="day">3</td><td data-action="selectDay" data-day="02/04/2021" class="day">4</td><td data-action="selectDay" data-day="02/05/2021" class="day">5</td><td data-action="selectDay" data-day="02/06/2021" class="day weekend">6</td></tr><tr><td data-action="selectDay" data-day="02/07/2021" class="day weekend">7</td><td data-action="selectDay" data-day="02/08/2021" class="day">8</td><td data-action="selectDay" data-day="02/09/2021" class="day">9</td><td data-action="selectDay" data-day="02/10/2021" class="day">10</td><td data-action="selectDay" data-day="02/11/2021" class="day">11</td><td data-action="selectDay" data-day="02/12/2021" class="day">12</td><td data-action="selectDay" data-day="02/13/2021" class="day weekend">13</td></tr><tr><td data-action="selectDay" data-day="02/14/2021" class="day weekend">14</td><td data-action="selectDay" data-day="02/15/2021" class="day">15</td><td data-action="selectDay" data-day="02/16/2021" class="day">16</td><td data-action="selectDay" data-day="02/17/2021" class="day">17</td><td data-action="selectDay" data-day="02/18/2021" class="day">18</td><td data-action="selectDay" data-day="02/19/2021" class="day">19</td><td data-action="selectDay" data-day="02/20/2021" class="day weekend">20</td></tr><tr><td data-action="selectDay" data-day="02/21/2021" class="day weekend">21</td><td data-action="selectDay" data-day="02/22/2021" class="day active today">22</td><td data-action="selectDay" data-day="02/23/2021" class="day">23</td><td data-action="selectDay" data-day="02/24/2021" class="day">24</td><td data-action="selectDay" data-day="02/25/2021" class="day">25</td><td data-action="selectDay" data-day="02/26/2021" class="day">26</td><td data-action="selectDay" data-day="02/27/2021" class="day weekend">27</td></tr><tr><td data-action="selectDay" data-day="02/28/2021" class="day weekend">28</td><td data-action="selectDay" data-day="03/01/2021" class="day new">1</td><td data-action="selectDay" data-day="03/02/2021" class="day new">2</td><td data-action="selectDay" data-day="03/03/2021" class="day new">3</td><td data-action="selectDay" data-day="03/04/2021" class="day new">4</td><td data-action="selectDay" data-day="03/05/2021" class="day new">5</td><td data-action="selectDay" data-day="03/06/2021" class="day new weekend">6</td></tr><tr><td data-action="selectDay" data-day="03/07/2021" class="day new weekend">7</td><td data-action="selectDay" data-day="03/08/2021" class="day new">8</td><td data-action="selectDay" data-day="03/09/2021" class="day new">9</td><td data-action="selectDay" data-day="03/10/2021" class="day new">10</td><td data-action="selectDay" data-day="03/11/2021" class="day new">11</td><td data-action="selectDay" data-day="03/12/2021" class="day new">12</td><td data-action="selectDay" data-day="03/13/2021" class="day new weekend">13</td></tr></tbody></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Year"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2021</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Year"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectMonth" class="month">Jan</span><span data-action="selectMonth" class="month active">Feb</span><span data-action="selectMonth" class="month">Mar</span><span data-action="selectMonth" class="month">Apr</span><span data-action="selectMonth" class="month">May</span><span data-action="selectMonth" class="month">Jun</span><span data-action="selectMonth" class="month">Jul</span><span data-action="selectMonth" class="month">Aug</span><span data-action="selectMonth" class="month">Sep</span><span data-action="selectMonth" class="month">Oct</span><span data-action="selectMonth" class="month">Nov</span><span data-action="selectMonth" class="month">Dec</span></td></tr></tbody></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Decade"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2020-2029</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Decade"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectYear" class="year old">2019</span><span data-action="selectYear" class="year">2020</span><span data-action="selectYear" class="year active">2021</span><span data-action="selectYear" class="year">2022</span><span data-action="selectYear" class="year">2023</span><span data-action="selectYear" class="year">2024</span><span data-action="selectYear" class="year">2025</span><span data-action="selectYear" class="year">2026</span><span data-action="selectYear" class="year">2027</span><span data-action="selectYear" class="year">2028</span><span data-action="selectYear" class="year">2029</span><span data-action="selectYear" class="year old">2030</span></td></tr></tbody></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Century"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Century"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectDecade" class="decade old" data-selection="2006">1990</span><span data-action="selectDecade" class="decade" data-selection="2006">2000</span><span data-action="selectDecade" class="decade active" data-selection="2016">2010</span><span data-action="selectDecade" class="decade active" data-selection="2026">2020</span><span data-action="selectDecade" class="decade" data-selection="2036">2030</span><span data-action="selectDecade" class="decade" data-selection="2046">2040</span><span data-action="selectDecade" class="decade" data-selection="2056">2050</span><span data-action="selectDecade" class="decade" data-selection="2066">2060</span><span data-action="selectDecade" class="decade" data-selection="2076">2070</span><span data-action="selectDecade" class="decade" data-selection="2086">2080</span><span data-action="selectDecade" class="decade" data-selection="2096">2090</span><span data-action="selectDecade" class="decade old" data-selection="2106">2100</span></td></tr></tbody></table></div></div></li><li class="picker-switch accordion-toggle"></li></ul></div></div>--}}
{{--                </div>--}}
{{--                <!-- /.card-body -->--}}
{{--            </div>--}}
            <!-- /.card -->
            <div class="mt-5">
              <h4 class="text-center">  BIỂU ĐỒ LƯƠT XEM TỪNG BÀI TRONG NGÀY {{\Carbon\Carbon::now()->format('Y-m-d')}}</h4>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <canvas id="line-chart"></canvas>
                    </div>

                    <div>
                        <b class="font-weight-bold text-danger ">Chú thích : </b>
                        <ul class="note">

                        </ul>
                    </div>
                </div>
            </div>
        </section>



    </div>




{{--    <div class="row">--}}
{{--        <div class="col-md-10 col-md-offset-1">--}}
{{--            <div class="panel panel-default">--}}
{{--                <div class="panel-heading"><b>Charts</b></div>--}}
{{--                <div class="panel-body">--}}
{{--                    <canvas id="canvas" height="280" width="600"></canvas>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


    <!-- Calendar -->

@endsection
{{--@section('page-script')--}}

{{--@endsection--}}











<script type="text/javascript">
    window.onload = function () {
        var url = "{{url('stock/chart')}}";
        var Title = new Array();
        var View = new Array();
        var PostId = new Array();
        var id_title = new Array();
        var updated_at = new Array();
                $.get(url, function(response){
                    response.forEach(function(data){
                        Title.push(data.title);
                        View.push(data.count);
                        PostId.push(data.post_id);
                        updated_at.push(data.updated_at);
                        id_title.push(data.post_id + "-" + data.title)
                    });

                   var result = id_title.map(function (element){
                      return `
                        <li>${element}</li>
                      `
                   })
                    document.querySelector(".note").innerHTML = result.join("");
                    Chart.defaults.global.defaultFontColor = '#000000';
                    Chart.defaults.global.defaultFontFamily = 'Arial';
                    Chart.defaults.line.spanGaps = true;
                    var lineChart = document.getElementById('line-chart');
                    var myChart = new Chart(lineChart, {
                        type: 'line',
                        data: {
                            labels: PostId,
                            datasets: [
                                {

                                    label: 'Lượt xem   ',
                                    data: View,
                                    // backgroundColor: 'rgba(0, 128, 128, 0.3)',
                                    backgroundColor: 'transparent',
                                    borderColor: 'rgba(0, 128, 128, 0.7)',
                                    borderWidth: 1
                                },
                                // {
                                //     label: 'Ruby Activities',
                                //     data: [18, 72, 10, 39, 19, 75],
                                //     backgroundColor: 'rgba(0, 128, 128, 0.7)',
                                //     borderColor: 'rgba(0, 128, 128, 1)',
                                //     borderWidth: 1
                                // }
                            ]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    stacked: true
                                }]
                            }
                        }
                    });

                });


    };
</script>



