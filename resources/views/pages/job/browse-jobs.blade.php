@extends('layouts.main')

@section('title', 'Browse Jobs')

@section('content')
    <!-- Titlebar
================================================== -->
    <div id="titlebar">
        <div class="container">
            <div class="ten columns">
                <span>We found 1,412 jobs matching:</span>
                <h2>Web, Software & IT</h2>
            </div>

            <div class="six columns">
                <a href="dashboard-add-job.html" class="button">Post a Job, It’s Free!</a>
            </div>
        </div>
    </div>

    <!-- Content
        ================================================== -->
    <div class="container">
        <!-- Recent Jobs -->
        <div class="col-md-8">
            <div class="padding-right">
                <div id="listjob" class="listings-container">
                    {{--                    @foreach($jobs as $j)--}}
                    <a href="{{--{{route('jobs.show',$j->id)}}--}}"
                       class="listing hidden {{--@if($j->jobtypes!=null && count($j->jobtypes)!=0) {{$j->jobtypes[0]->class_css}} @endif--}} ">
                        <div class="listing-logo">
                            <img src="images/job-list-logo-01.png" alt="">
                        </div>
                        <div class="listing-title">
                            <h4>{{-- {{$j->job_title}} --}}<span
                                    class="listing-type">{{--@if($j->jobtypes!=null && count($j->jobtypes)!=0) {{$j->jobtypes[0]->name}}@endif--}}</span>
                            </h4>
                            <ul class="listing-icons">
                                <li><i class="ln ln-icon-Management"></i> {{--{{$j->company->name}}--}}</li>
                                <li><i class="ln ln-icon-Map2"></i> {{--{{$j->location}}--}}</li>
                                <li><i class="ln ln-icon-Money-2"></i>{{-- ${{$j->salary}}--}}</li>
                                <li>
                                    <div class="listing-date new">new</div>
                                </li>
                            </ul>
                        </div>
                    </a>
                    {{--                    @endforeach--}}
                </div>
                <div class="clearfix"></div>

                <div class="pagination-container">
                    <nav id="paginations" class="pagination hidden">
                        <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                            <span class="page-link" aria-hidden="true">‹</span>
                        </li>
                        <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                        <li class="page-item"><a class="page-link" >2</a></li>
                        <li class="page-item"><a class="page-link">3</a></li>
                        <li class="page-item">
                            <a class="page-link" data-content="3" rel="next" aria-label="Next »">›</a>
                        </li>
                    </nav>
                    {{--                {{$jobs->links()}}--}}
                </div>
            </div>
        </div>

        <!-- Widgets -->
        <div class="col-md-4">
            <!-- Sort by -->
            <div class="widget">
                <h4>Sort by</h4>
                <!-- Select -->
                <select data-placeholder="Choose Category" class="chosen-select-no-single">
                    <option selected="selected" value="recent">Newest</option>
                    <option value="oldest">Oldest</option>
                    <option value="expiry">Expiring Soon</option>
                    <option value="ratehigh">Hourly Rate – Highest First</option>
                    <option value="ratelow">Hourly Rate – Lowest First</option>
                </select>
            </div>

            <!-- Location -->
            <div class="widget">
                <h4>Location</h4>
                <form action="#" method="get">
                    <select data-placeholder="Choose Location" class="chosen-select-no-single">
                        <option selected="selected" value="recent">Ho Chi Minh</option>
                        <option value="oldest">Ha Noi</option>
                        <option value="oldest">Da Nang</option>
                        <option value="oldest">Orther</option>
                    </select>
                    <br/>
                    <button class="button mt-4">Filter</button>
                </form>
            </div>

            <!-- Job Type -->
            <div class="widget">
                <h4>Job Type</h4>

                <ul class="checkboxes">
                    <li>
                        <input id="check-1" type="checkbox" name="check" value="check-1" checked/>
                        <label for="check-1">Any Type</label>
                    </li>
                    <li>
                        <input id="check-2" type="checkbox" name="check" value="check-2"/>
                        <label for="check-2">Full-Time <span>(312)</span></label>
                    </li>
                    <li>
                        <input id="check-3" type="checkbox" name="check" value="check-3"/>
                        <label for="check-3">Part-Time <span>(269)</span></label>
                    </li>
                    <li>
                        <input id="check-4" type="checkbox" name="check" value="check-4"/>
                        <label for="check-4">Internship <span>(46)</span></label>
                    </li>
                    <li>
                        <input id="check-5" type="checkbox" name="check" value="check-5"/>
                        <label for="check-5">Freelance <span>(119)</span></label>
                    </li>
                </ul>
            </div>

            <!-- Rate/Hr -->
            <div class="widget">
                <h4>Rate / Hr</h4>

                <ul class="checkboxes">
                    <li>
                        <input id="check-6" type="checkbox" name="check" value="check-6" checked/>
                        <label for="check-6">Any Rate</label>
                    </li>
                    <li>
                        <input id="check-7" type="checkbox" name="check" value="check-7"/>
                        <label for="check-7">$0 - $25 <span>(231)</span></label>
                    </li>
                    <li>
                        <input id="check-8" type="checkbox" name="check" value="check-8"/>
                        <label for="check-8">$25 - $50 <span>(297)</span></label>
                    </li>
                    <li>
                        <input id="check-9" type="checkbox" name="check" value="check-9"/>
                        <label for="check-9">$50 - $100 <span>(78)</span></label>
                    </li>
                    <li>
                        <input id="check-10" type="checkbox" name="check" value="check-10"/>
                        <label for="check-10">$100 - $200 <span>(98)</span></label>
                    </li>
                    <li>
                        <input id="check-11" type="checkbox" name="check" value="check-11"/>
                        <label for="check-11">$200+ <span>(21)</span></label>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Widgets / End -->
    </div>
@endsection()
