@extends('frontend.parent')
@section('title')
    {{trans('home_trans.Sign In')}}
@endsection
@section('style')
    <style type="text/css">.fancybox-margin{margin-right:17px;}</style>
    <script charset="utf-8" src="https://platform.twitter.com/js/moment~timeline.9f954c9c92ade4ce690c15a81c5566e0.js"></script>
    <script charset="utf-8" src="https://platform.twitter.com/js/timeline.0f2977b5b9778cf00d0c90532a8b279b.js"></script>


@endsection
@section('content')
    <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
    <div class="c-layout-breadcrumbs-1 c-subtitle c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
        <div class="container">
            <div class="c-page-title c-pull-left">
                <h3 class="c-font-uppercase c-font-sbold"> {{trans('home_trans.Sign In')}}/{{trans('home_trans.Register')}}</h3>
                <h4 class=""></h4>
            </div>
            <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                <li><a href="{{route('home')}}">{{trans('home_trans.Home')}}</a></li>
                <li>/</li>
                <li class="c-state_active">{{trans('home_trans.Sign In')}}</li>


            </ul>
        </div>
    </div><!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
    <!-- BEGIN: PAGE CONTENT -->
    <!-- BEGIN: CONTENT/SHOPS/SHOP-LOGIN-REGISTER-1 -->
    <div class="c-content-box c-size-md c-bg-white">
        <div class="container">
            <div class="c-shop-login-register-1">
                <div class="row">
                    @if(session()->has('alert-type'))
                        <div class="alert {{session()->get('alert-type')}}" role="alert">
                            {{session()->get('message')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-md-6">
                        <div class="panel panel-default c-panel">
                            <div class="panel-body c-panel-body">
                                @if($type == 'user')
                                    <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">{{trans('home_trans.Sign In')}} {{trans('home_trans.Users')}}</h3>
                                @elseif($type == 'industry')
                                    <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">{{trans('home_trans.Sign In')}} {{trans('home_trans.Industries')}}</h3>
                                @endif
                                <form class="c-form-login" action="{{route('login')}}" method="POST">
                                    @csrf
                                    <div class="form-group has-feedback">
                                        <input type="email" name="email" class="form-control c-square c-theme input-lg" placeholder="{{trans('home_trans.Email')}}">
                                        <input type="hidden" value="{{$type}}" name="type">
                                        <span class="glyphicon glyphicon-user form-control-feedback c-font-grey"></span>
                                        <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <input type="password" name="password" class="form-control c-square c-theme input-lg" placeholder="{{trans('home_trans.Password')}}">
                                        <span class="glyphicon glyphicon-lock form-control-feedback c-font-grey"></span>
                                        <span class="text-danger">@error('password'){{$message}} @enderror</span>
                                    </div>
                                    <div class="row c-margin-t-40">
                                        <div class="col-xs-8">
                                            <div class="c-checkbox">
                                                <input type="checkbox" id="checkbox1-77" class="c-check">
                                                <label for="checkbox1-77"> <span class="inc"></span>
                                                    <span class="check"></span> <span class="box"></span> {{trans('home_trans.Remember Me')}}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <button type="submit" class="pull-right btn btn-lg c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">{{trans('home_trans.Sign In')}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default c-panel">
                            <div class="panel-body c-panel-body">
                                <div class="c-content-title-1">
                                    <h3 class="c-left"><i class="icon-user"></i> {{trans('home_trans.Dont have an account yet?')}}</h3>
                                    <div class="c-line-left c-theme-bg"></div>
                                    <p>{{trans('home_trans.Join us and enjoy online shopping today.')}}</p>
                                </div>
                                @if($type == 'user')
                                    <div class="c-margin-fix">
                                        <div class="c-checkbox c-toggle-hide" data-object-selector="c-form-register" data-animation-speed="600">
                                            <input type="checkbox" id="checkbox6-444" class="c-check" >
                                            <label class="btn btn-sm c-theme-btn c-btn-square c-btn-bold" for="checkbox6-444" style="color: white;"> <span class="inc"></span>
                                                {{trans('home_trans.Register Now')}} !</label>
                                        </div>

                                    </div>
                                @elseif($type == 'industry')
                                    <div class="c-margin-fix">
                                        <div class="c-checkbox c-toggle-hide" data-object-selector="c-form-register-company" data-animation-speed="600">
                                            <input type="checkbox" id="checkbox6-444" class="c-check" >
                                            <label class="btn btn-sm c-theme-btn c-btn-square c-btn-bold" for="checkbox6-444" style="color: white;"> <span class="inc"></span>
                                                {{trans('home_trans.Register Now')}} !</label>
                                        </div>

                                    </div>
                                @endif

                                <form class="c-form-register c-margin-t-20 " action="{{route('register')}}" method="POST" style="display: none;">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label">{{trans('home_trans.Full Name')}}</label>
                                                <input type="text" name="name" class="form-control c-square c-theme" placeholder="{{trans('home_trans.Full Name')}}">
                                                @error('name')
                                                <span class="text-danger" role="alert">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">{{trans('home_trans.User Name')}}</label>
                                                <input type="text" name="user_name" class="form-control c-square c-theme" placeholder="{{trans('home_trans.User Name')}}">
                                                @error('user_name')
                                                <span class="text-danger" role="alert">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{trans('home_trans.Address')}}</label>
                                        <input type="text" name="address" class="form-control c-square c-theme" placeholder=" {{trans('home_trans.Address')}}">
                                        @error('address')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">{{trans('home_trans.Country')}}</label>
                                        <select class="form-control input-lg c-square" name="country" id="country" >
                                            <option value="1" hidden disabled selected>{{trans('home_trans.Country')}}</option>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antartica">Antarctica</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Aruba">Aruba</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Austria">Austria</option>
                                            <option value="Azerbaijan">Azerbaijan</option>
                                            <option value="Bahamas">Bahamas</option>
                                            <option value="Bahrain">Bahrain</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Barbados">Barbados</option>
                                            <option value="Belarus">Belarus</option>
                                            <option value="Belgium">Belgium</option>
                                            <option value="Belize">Belize</option>
                                            <option value="Benin">Benin</option>
                                            <option value="Bermuda">Bermuda</option>
                                            <option value="Bhutan">Bhutan</option>
                                            <option value="Bolivia">Bolivia</option>
                                            <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Bouvet Island">Bouvet Island</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Congo">Congo, the Democratic Republic of the</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                            <option value="Croatia">Croatia (Hrvatska)</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="East Timor">East Timor</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="France Metropolitan">France, Metropolitan</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Territories">French Southern Territories</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                                            <option value="Holy See">Holy See (Vatican City State)</option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran">Iran (Islamic Republic of)</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                                            <option value="Korea">Korea, Republic of</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Lao">Lao People's Democratic Republic</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macau">Macau</option>
                                            <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia">Micronesia, Federated States of</option>
                                            <option value="Moldova">Moldova, Republic of</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Palestine">Palestine</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Pitcairn">Pitcairn</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Reunion">Reunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russia">Russian Federation</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                            <option value="Saint LUCIA">Saint LUCIA</option>
                                            <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                            <option value="Span">Spain</option>
                                            <option value="SriLanka">Sri Lanka</option>
                                            <option value="St. Helena">St. Helena</option>
                                            <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syria">Syrian Arab Republic</option>
                                            <option value="Taiwan">Taiwan, Province of China</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania">Tanzania, United Republic of</option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="United States">United States</option>
                                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Vietnam">Viet Nam</option>
                                            <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                            <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                            <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                                            <option value="Western Sahara">Western Sahara</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                        @error('country')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">{{trans('home_trans.Email')}}</label>
                                            <input type="email" name="email" class="form-control c-square c-theme" placeholder="{{trans('home_trans.Email')}} ">
                                            @error('email')
                                            <span class="text-danger" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">{{trans('home_trans.Phone Number')}}</label>
                                            <input type="tel" name="mobile" class="form-control c-square c-theme" placeholder="{{trans('home_trans.Phone Number')}}">
                                            @error('mobile')
                                            <span class="text-danger" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{trans('home_trans.Password')}}</label>
                                        <input type="password" name="password" class="form-control c-square c-theme" placeholder="{{trans('home_trans.Password')}}">
                                        @error('password')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group c-margin-t-40">
                                        <button type="submit" class="btn btn-lg c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">{{trans('home_trans.Register')}}</button>
                                    </div>
                                </form>
                                <form class="c-form-register-company c-margin-t-20 " action="{{route('industry.register')}}" method="POST" style="display: none;" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            @foreach(config('lang') as $key => $lang)
                                                <div class="col-md-6">
                                                    <label class="control-label">{{trans('home_trans.Industry Name')}} ({{$lang}})</label>
                                                    <input  name="name[{{$key}}]" class="form-control c-square c-theme" placeholder="{{trans('home_trans.Industry Name')}}">
                                                    @error('name.*'.$key)
                                                    <span class="text-danger" role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label" >{{trans('home_trans.Workdays')}}</label><br>
                                            <select class="form-control input-lg c-square" id="multiple-checkboxes"  multiple="multiple"  name="work_time[]" >
                                                <option value="Saturday">{{trans('home_trans.Saturday')}}</option>
                                                <option value="Sunday">{{trans('home_trans.Sunday ')}}</option>
                                                <option value="Monday">{{trans('home_trans.Monday')}}</option>
                                                <option value="Tuesday">{{trans('home_trans.Tuesday')}}</option>
                                                <option value="Wednesday">{{trans('home_trans.Wednesday')}}</option>
                                                <option value="Thursday">{{trans('home_trans.Thursday')}}</option>
                                                <option value="Friday">{{trans('home_trans.Friday')}}</option>
                                            </select>
                                            @error('work_time.')
                                            <span class="text-danger" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">{{trans('home_trans.Industrial Sectors')}}</label>
                                            <select class="form-control input-lg c-square" name="category_id" id="category_id">
                                                <option hidden selected disabled>{{trans('home_trans.Industrial Sectors')}}</option>
                                                @foreach(App\Models\Category::all() as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="text-danger" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">{{trans('home_trans.State')}}</label>
                                            <select class="form-control input-lg c-square" name="state" id="state" >
                                                <option value="1" hidden disabled selected>{{trans('home_trans.State')}}</option>
                                                <option value="{{trans('home_trans.Abu dhabi')}}">{{trans('home_trans.Abu dhabi')}}</option>
                                                <option value="{{trans('home_trans.Dubai')}}">{{trans('home_trans.Dubai')}}</option>
                                                <option value="{{trans('home_trans.Sharjah')}}">{{trans('home_trans.Sharjah')}}</option>
                                                <option value="{{trans('home_trans.Ajman')}}">{{trans('home_trans.Ajman')}}</option>
                                                <option value="{{trans('home_trans.Umm Al Quwain')}}">{{trans('home_trans.Umm Al Quwain')}}</option>
                                                <option value="{{trans('home_trans.Ras al khaima')}}">{{trans('home_trans.Ras al khaima')}}</option>
                                                <option value="{{trans('home_trans.Fujairah')}}">{{trans('home_trans.Fujairah')}}</option>
                                            </select>
                                            @error('state')
                                            <span class="text-danger" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label ">{{trans('home_trans.Industrial Zone')}}</label>
                                            <select class="form-control input-lg c-square" name="industrial_area" id="industrial_area" >
                                                <option value="1" hidden disabled selected>{{trans('home_trans.Industrial Zone')}}</option>
                                            </select>
                                            @error('industrial_area')
                                            <span class="text-danger" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">{{trans('home_trans.Address')}}</label>
                                            <input type="text" name="address" class="form-control c-square c-theme" placeholder=" {{trans('home_trans.Address')}}">
                                            @error('address')
                                            <span class="text-danger" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label">{{trans('home_trans.Industrial license')}}</label>
                                            <input type="file" value="{{old('industrial_license')}}" name="industrial_license" class="form-control @error('industrial_license') is-invalid @enderror" accept="/*" >
                                            @error('industrial_license')
                                            <span class="text-danger" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{trans('home_trans.Website')}}</label>
                                        <input type="url" name="website" class="form-control c-square c-theme" placeholder="{{trans('home_trans.Website')}}">
                                        @error('website')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">{{trans('home_trans.Salesperson Email')}}</label>
                                            <input type="email" name="salesperson_email" class="form-control c-square c-theme" placeholder="{{trans('home_trans.Salesperson Email')}}">
                                            @error('salesperson_email')
                                            <span class="text-danger" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">{{trans('home_trans.Salesperson Phone')}}</label>
                                            <input type="tel" name="salesperson_phone" class="form-control c-square c-theme" placeholder="{{trans('home_trans.Salesperson Phone')}}">
                                            @error('salesperson_phone')
                                            <span class="text-danger" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="control-label">{{trans('home_trans.Industry Email')}}</label>
                                            <input type="email" name="email" class="form-control c-square c-theme" placeholder="{{trans('home_trans.Industry Email')}}">
                                            @error('email')
                                            <span class="text-danger" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">{{trans('home_trans.Industry Phone')}}</label>
                                            <input type="tel" name="industry_phone" class="form-control c-square c-theme" placeholder="{{trans('home_trans.Industry Phone')}}">
                                            @error('industry_phone')
                                            <span class="text-danger" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">{{trans('home_trans.Password')}}</label>
                                        <input type="password" name="password" class="form-control c-square c-theme @error('password') is-invalid @enderror" placeholder="{{trans('home_trans.Password')}}">
                                        @error('password')
                                        <span class="text-danger" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group c-margin-t-40">
                                        <button type="submit" class="btn btn-lg c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">{{trans('home_trans.Register')}}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if($type == 'user')
                        <div class="row">
                            <div class="col-md-12" >
                                <div class="list-unstyled c-bs-grid-small-space">
                                    <div class="row">
                                        {{--                                            <div class="col-md-4 col-sm-4 c-margin-t-10">--}}
                                        {{--                                                <a class="btn btn-block btn-social c-btn-square c-btn-uppercase btn-md btn-twitter">--}}
                                        {{--                                                    <i class="fa fa-twitter"></i> Sign in with Twitter--}}
                                        {{--                                                </a>--}}
                                        {{--                                            </div>--}}
                                        <div class="col-md-4 col-sm-4 c-margin-t-10">
                                            <a href="{{ url('redirect/facebook') }}" class="btn btn-block btn-social c-btn-square c-btn-uppercase btn-md btn-facebook">
                                                <i class="fa fa-facebook"></i> {{trans('home_trans.Sign in with Facebook')}}
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-sm-4 c-margin-t-10">
                                            <a href="{{ url('redirect/google') }}" class="btn btn-block btn-social c-btn-square c-btn-uppercase btn-md btn-google">
                                                <i class="fa fa-google-plus"></i> {{trans('home_trans.Sign in with Google')}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- END: CONTENT/SHOPS/SHOP-LOGIN-REGISTER-1 -->

        <!-- END: PAGE CONTENT -->
    </div>

@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#state').on('change', function() {
                $('#industrial_area').empty()
                var state = this.value;
                $.ajax({
                    url: "{{route('get_sections')}}",
                    type: "GET",
                    data: {
                        state: state
                    },
                    cache: false,
                    success: function(result){
                        $.each(result, function(key, modelName){
                            //Use the Option() constructor to create a new HTMLOptionElement.
                            var option = new Option(key, modelName);
                            //Convert the HTMLOptionElement into a JQuery object that can be used with the append method.
                            $(option).html(modelName);
                            $(option).val(modelName);
                            //Append the option to our Select element.
                            $("#industrial_area").append(option);

                        });
                    }
                });
            });
        });
    </script>
    <script>
        !function ($) {
            "use strict";// jshint ;_;

            if (typeof ko !== 'undefined' && ko.bindingHandlers && !ko.bindingHandlers.multiselect) {
                ko.bindingHandlers.multiselect = {
                    after: ['options', 'value', 'selectedOptions', 'enable', 'disable'],

                    init: function(element, valueAccessor, allBindings, viewModel, bindingContext) {
                        var $element = $(element);
                        var config = ko.toJS(valueAccessor());

                        $element.multiselect(config);

                        if (allBindings.has('options')) {
                            var options = allBindings.get('options');
                            if (ko.isObservable(options)) {
                                ko.computed({
                                    read: function() {
                                        options();
                                        setTimeout(function() {
                                            var ms = $element.data('multiselect');
                                            if (ms)
                                                ms.updateOriginalOptions();//Not sure how beneficial this is.
                                            $element.multiselect('rebuild');
                                        }, 1);
                                    },
                                    disposeWhenNodeIsRemoved: element
                                });
                            }
                        }

                        //value and selectedOptions are two-way, so these will be triggered even by our own actions.
                        //It needs some way to tell if they are triggered because of us or because of outside change.
                        //It doesn't loop but it's a waste of processing.
                        if (allBindings.has('value')) {
                            var value = allBindings.get('value');
                            if (ko.isObservable(value)) {
                                ko.computed({
                                    read: function() {
                                        value();
                                        setTimeout(function() {
                                            $element.multiselect('refresh');
                                        }, 1);
                                    },
                                    disposeWhenNodeIsRemoved: element
                                }).extend({ rateLimit: 100, notifyWhenChangesStop: true });
                            }
                        }

                        //Switched from arrayChange subscription to general subscription using 'refresh'.
                        //Not sure performance is any better using 'select' and 'deselect'.
                        if (allBindings.has('selectedOptions')) {
                            var selectedOptions = allBindings.get('selectedOptions');
                            if (ko.isObservable(selectedOptions)) {
                                ko.computed({
                                    read: function() {
                                        selectedOptions();
                                        setTimeout(function() {
                                            $element.multiselect('refresh');
                                        }, 1);
                                    },
                                    disposeWhenNodeIsRemoved: element
                                }).extend({ rateLimit: 100, notifyWhenChangesStop: true });
                            }
                        }

                        var setEnabled = function (enable) {
                            setTimeout(function () {
                                if (enable)
                                    $element.multiselect('enable');
                                else
                                    $element.multiselect('disable');
                            });
                        };

                        if (allBindings.has('enable')) {
                            var enable = allBindings.get('enable');
                            if (ko.isObservable(enable)) {
                                ko.computed({
                                    read: function () {
                                        setEnabled(enable());
                                    },
                                    disposeWhenNodeIsRemoved: element
                                }).extend({ rateLimit: 100, notifyWhenChangesStop: true });
                            } else {
                                setEnabled(enable);
                            }
                        }

                        if (allBindings.has('disable')) {
                            var disable = allBindings.get('disable');
                            if (ko.isObservable(disable)) {
                                ko.computed({
                                    read: function () {
                                        setEnabled(!disable());
                                    },
                                    disposeWhenNodeIsRemoved: element
                                }).extend({ rateLimit: 100, notifyWhenChangesStop: true });
                            } else {
                                setEnabled(!disable);
                            }
                        }

                        ko.utils.domNodeDisposal.addDisposeCallback(element, function() {
                            $element.multiselect('destroy');
                        });
                    },

                    update: function(element, valueAccessor, allBindings, viewModel, bindingContext) {
                        var $element = $(element);
                        var config = ko.toJS(valueAccessor());

                        $element.multiselect('setOptions', config);
                        $element.multiselect('rebuild');
                    }
                };
            }

            function forEach(array, callback) {
                for (var index = 0; index < array.length; ++index) {
                    callback(array[index], index);
                }
            }

            /**
             * Constructor to create a new multiselect using the given select.
             *
             * @param {jQuery} select
             * @param {Object} options
             * @returns {Multiselect}
             */
            function Multiselect(select, options) {

                this.$select = $(select);

                // Placeholder via data attributes
                if (this.$select.attr("data-placeholder")) {
                    options.nonSelectedText = this.$select.data("placeholder");
                }

                this.options = this.mergeOptions($.extend({}, options, this.$select.data()));

                // Initialization.
                // We have to clone to create a new reference.
                this.originalOptions = this.$select.clone()[0].options;
                this.query = '';
                this.searchTimeout = null;
                this.lastToggledInput = null;

                this.options.multiple = this.$select.attr('multiple') === "multiple";
                this.options.onChange = $.proxy(this.options.onChange, this);
                this.options.onDropdownShow = $.proxy(this.options.onDropdownShow, this);
                this.options.onDropdownHide = $.proxy(this.options.onDropdownHide, this);
                this.options.onDropdownShown = $.proxy(this.options.onDropdownShown, this);
                this.options.onDropdownHidden = $.proxy(this.options.onDropdownHidden, this);
                this.options.onInitialized = $.proxy(this.options.onInitialized, this);

                // Build select all if enabled.
                this.buildContainer();
                this.buildButton();
                this.buildDropdown();
                this.buildSelectAll();
                this.buildDropdownOptions();
                this.buildFilter();

                this.updateButtonText();
                this.updateSelectAll(true);

                if (this.options.disableIfEmpty && $('option', this.$select).length <= 0) {
                    this.disable();
                }

                this.$select.hide().after(this.$container);
                this.options.onInitialized(this.$select, this.$container);
            }

            Multiselect.prototype = {

                defaults: {
                    /**
                     * Default text function will either print 'None selected' in case no
                     * option is selected or a list of the selected options up to a length
                     * of 3 selected options.
                     *
                     * @param {jQuery} options
                     * @param {jQuery} select
                     * @returns {String}
                     */
                    buttonText: function(options, select) {
                        if (this.disabledText.length > 0
                            && (this.disableIfEmpty || select.prop('disabled'))
                            && options.length == 0) {

                            return this.disabledText;
                        }
                        else if (options.length === 0) {
                            return this.nonSelectedText;
                        }
                        else if (this.allSelectedText
                            && options.length === $('option', $(select)).length
                            && $('option', $(select)).length !== 1
                            && this.multiple) {

                            if (this.selectAllNumber) {
                                return this.allSelectedText + ' (' + options.length + ')';
                            }
                            else {
                                return this.allSelectedText;
                            }
                        }
                        else if (options.length > this.numberDisplayed) {
                            return options.length + ' ' + this.nSelectedText;
                        }
                        else {
                            var selected = '';
                            var delimiter = this.delimiterText;

                            options.each(function() {
                                var label = ($(this).attr('label') !== undefined) ? $(this).attr('label') : $(this).text();
                                selected += label + delimiter;
                            });

                            return selected.substr(0, selected.length - 2);
                        }
                    },
                    /**
                     * Updates the title of the button similar to the buttonText function.
                     *
                     * @param {jQuery} options
                     * @param {jQuery} select
                     * @returns {@exp;selected@call;substr}
                     */
                    buttonTitle: function(options, select) {
                        if (options.length === 0) {
                            return this.nonSelectedText;
                        }
                        else {
                            var selected = '';
                            var delimiter = this.delimiterText;

                            options.each(function () {
                                var label = ($(this).attr('label') !== undefined) ? $(this).attr('label') : $(this).text();
                                selected += label + delimiter;
                            });
                            return selected.substr(0, selected.length - 2);
                        }
                    },
                    /**
                     * Create a label.
                     *
                     * @param {jQuery} element
                     * @returns {String}
                     */
                    optionLabel: function(element){
                        return $(element).attr('label') || $(element).text();
                    },
                    /**
                     * Create a class.
                     *
                     * @param {jQuery} element
                     * @returns {String}
                     */
                    optionClass: function(element) {
                        return $(element).attr('class') || '';
                    },
                    /**
                     * Triggered on change of the multiselect.
                     *
                     * Not triggered when selecting/deselecting options manually.
                     *
                     * @param {jQuery} option
                     * @param {Boolean} checked
                     */
                    onChange : function(option, checked) {

                    },
                    /**
                     * Triggered when the dropdown is shown.
                     *
                     * @param {jQuery} event
                     */
                    onDropdownShow: function(event) {

                    },
                    /**
                     * Triggered when the dropdown is hidden.
                     *
                     * @param {jQuery} event
                     */
                    onDropdownHide: function(event) {

                    },
                    /**
                     * Triggered after the dropdown is shown.
                     *
                     * @param {jQuery} event
                     */
                    onDropdownShown: function(event) {

                    },
                    /**
                     * Triggered after the dropdown is hidden.
                     *
                     * @param {jQuery} event
                     */
                    onDropdownHidden: function(event) {

                    },
                    /**
                     * Triggered on select all.
                     */
                    onSelectAll: function(checked) {

                    },
                    /**
                     * Triggered after initializing.
                     *
                     * @param {jQuery} $select
                     * @param {jQuery} $container
                     */
                    onInitialized: function($select, $container) {

                    },
                    enableHTML: false,
                    buttonClass: 'btn btn-default',
                    inheritClass: false,
                    buttonWidth: 'auto',
                    buttonContainer: '<div class="btn-group" />',
                    dropRight: false,
                    dropUp: false,
                    selectedClass: 'active',
                    // Maximum height of the dropdown menu.
                    // If maximum height is exceeded a scrollbar will be displayed.
                    maxHeight: false,
                    checkboxName: false,
                    includeSelectAllOption: false,
                    includeSelectAllIfMoreThan: 0,
                    selectAllText: '{{trans('home_trans.Select All')}}',
                    selectAllValue: 'multiselect-all',
                    selectAllName: false,
                    selectAllNumber: true,
                    selectAllJustVisible: true,
                    enableFiltering: false,
                    enableCaseInsensitiveFiltering: false,
                    enableFullValueFiltering: false,
                    enableClickableOptGroups: false,
                    enableCollapsibelOptGroups: false,
                    filterPlaceholder: 'Search',
                    // possible options: 'text', 'value', 'both'
                    filterBehavior: 'text',
                    includeFilterClearBtn: true,
                    preventInputChangeEvent: false,
                    nonSelectedText: '{{trans('home_trans.Select work days')}}',
                    nSelectedText: 'selected',
                    allSelectedText: 'All selected',
                    numberDisplayed: 4,
                    disableIfEmpty: false,
                    disabledText: '',
                    delimiterText: ', ',
                    templates: {
                        button: '<button type="button" class="multiselect dropdown-toggle" data-toggle="dropdown"><span class="multiselect-selected-text"></span> <b class="caret"></b></button>',
                        ul: '<ul class="multiselect-container dropdown-menu"></ul>',
                        filter: '<li class="multiselect-item filter"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span><input class="form-control multiselect-search" type="text"></div></li>',
                        filterClearBtn: '<span class="input-group-btn"><button class="btn btn-default multiselect-clear-filter" type="button"><i class="glyphicon glyphicon-remove-circle"></i></button></span>',
                        li: '<li><a tabindex="0"><label></label></a></li>',
                        divider: '<li class="multiselect-item divider"></li>',
                        liGroup: '<li class="multiselect-item multiselect-group"><label></label></li>'
                    }
                },

                constructor: Multiselect,

                /**
                 * Builds the container of the multiselect.
                 */
                buildContainer: function() {
                    this.$container = $(this.options.buttonContainer);
                    this.$container.on('show.bs.dropdown', this.options.onDropdownShow);
                    this.$container.on('hide.bs.dropdown', this.options.onDropdownHide);
                    this.$container.on('shown.bs.dropdown', this.options.onDropdownShown);
                    this.$container.on('hidden.bs.dropdown', this.options.onDropdownHidden);
                },

                /**
                 * Builds the button of the multiselect.
                 */
                buildButton: function() {
                    this.$button = $(this.options.templates.button).addClass(this.options.buttonClass);
                    if (this.$select.attr('class') && this.options.inheritClass) {
                        this.$button.addClass(this.$select.attr('class'));
                    }
                    // Adopt active state.
                    if (this.$select.prop('disabled')) {
                        this.disable();
                    }
                    else {
                        this.enable();
                    }

                    // Manually add button width if set.
                    if (this.options.buttonWidth && this.options.buttonWidth !== 'auto') {
                        this.$button.css({
                            'width' : this.options.buttonWidth,
                            'overflow' : 'hidden',
                            'text-overflow' : 'ellipsis'
                        });
                        this.$container.css({
                            'width': this.options.buttonWidth
                        });
                    }

                    // Keep the tab index from the select.
                    var tabindex = this.$select.attr('tabindex');
                    if (tabindex) {
                        this.$button.attr('tabindex', tabindex);
                    }

                    this.$container.prepend(this.$button);
                },

                /**
                 * Builds the ul representing the dropdown menu.
                 */
                buildDropdown: function() {

                    // Build ul.
                    this.$ul = $(this.options.templates.ul);

                    if (this.options.dropRight) {
                        this.$ul.addClass('pull-right');
                    }

                    // Set max height of dropdown menu to activate auto scrollbar.
                    if (this.options.maxHeight) {
                        // TODO: Add a class for this option to move the css declarations.
                        this.$ul.css({
                            'max-height': this.options.maxHeight + 'px',
                            'overflow-y': 'auto',
                            'overflow-x': 'hidden'
                        });
                    }

                    if (this.options.dropUp) {

                        var height = Math.min(this.options.maxHeight, $('option[data-role!="divider"]', this.$select).length*26 + $('option[data-role="divider"]', this.$select).length*19 + (this.options.includeSelectAllOption ? 26 : 0) + (this.options.enableFiltering || this.options.enableCaseInsensitiveFiltering ? 44 : 0));
                        var moveCalc = height + 34;

                        this.$ul.css({
                            'max-height': height + 'px',
                            'overflow-y': 'auto',
                            'overflow-x': 'hidden',
                            'margin-top': "-" + moveCalc + 'px'
                        });
                    }

                    this.$container.append(this.$ul);
                },

                /**
                 * Build the dropdown options and binds all nessecary events.
                 *
                 * Uses createDivider and createOptionValue to create the necessary options.
                 */
                buildDropdownOptions: function() {

                    this.$select.children().each($.proxy(function(index, element) {

                        var $element = $(element);
                        // Support optgroups and options without a group simultaneously.
                        var tag = $element.prop('tagName')
                            .toLowerCase();

                        if ($element.prop('value') === this.options.selectAllValue) {
                            return;
                        }

                        if (tag === 'optgroup') {
                            this.createOptgroup(element);
                        }
                        else if (tag === 'option') {

                            if ($element.data('role') === 'divider') {
                                this.createDivider();
                            }
                            else {
                                this.createOptionValue(element);
                            }

                        }

                        // Other illegal tags will be ignored.
                    }, this));

                    // Bind the change event on the dropdown elements.
                    $('li input', this.$ul).on('change', $.proxy(function(event) {
                        var $target = $(event.target);

                        var checked = $target.prop('checked') || false;
                        var isSelectAllOption = $target.val() === this.options.selectAllValue;

                        // Apply or unapply the configured selected class.
                        if (this.options.selectedClass) {
                            if (checked) {
                                $target.closest('li')
                                    .addClass(this.options.selectedClass);
                            }
                            else {
                                $target.closest('li')
                                    .removeClass(this.options.selectedClass);
                            }
                        }

                        // Get the corresponding option.
                        var value = $target.val();
                        var $option = this.getOptionByValue(value);

                        var $optionsNotThis = $('option', this.$select).not($option);
                        var $checkboxesNotThis = $('input', this.$container).not($target);

                        if (isSelectAllOption) {
                            if (checked) {
                                this.selectAll(this.options.selectAllJustVisible);
                            }
                            else {
                                this.deselectAll(this.options.selectAllJustVisible);
                            }
                        }
                        else {
                            if (checked) {
                                $option.prop('selected', true);

                                if (this.options.multiple) {
                                    // Simply select additional option.
                                    $option.prop('selected', true);
                                }
                                else {
                                    // Unselect all other options and corresponding checkboxes.
                                    if (this.options.selectedClass) {
                                        $($checkboxesNotThis).closest('li').removeClass(this.options.selectedClass);
                                    }

                                    $($checkboxesNotThis).prop('checked', false);
                                    $optionsNotThis.prop('selected', false);

                                    // It's a single selection, so close.
                                    this.$button.click();
                                }

                                if (this.options.selectedClass === "active") {
                                    $optionsNotThis.closest("a").css("outline", "");
                                }
                            }
                            else {
                                // Unselect option.
                                $option.prop('selected', false);
                            }

                            // To prevent select all from firing onChange: #575
                            this.options.onChange($option, checked);
                        }

                        this.$select.change();

                        this.updateButtonText();
                        this.updateSelectAll();

                        if(this.options.preventInputChangeEvent) {
                            return false;
                        }
                    }, this));

                    $('li a', this.$ul).on('mousedown', function(e) {
                        if (e.shiftKey) {
                            // Prevent selecting text by Shift+click
                            return false;
                        }
                    });

                    $('li a', this.$ul).on('touchstart click', $.proxy(function(event) {
                        event.stopPropagation();

                        var $target = $(event.target);

                        if (event.shiftKey && this.options.multiple) {
                            if($target.is("label")){ // Handles checkbox selection manually (see https://github.com/davidstutz/bootstrap-multiselect/issues/431)
                                event.preventDefault();
                                $target = $target.find("input");
                                $target.prop("checked", !$target.prop("checked"));
                            }
                            var checked = $target.prop('checked') || false;

                            if (this.lastToggledInput !== null && this.lastToggledInput !== $target) { // Make sure we actually have a range
                                var from = $target.closest("li").index();
                                var to = this.lastToggledInput.closest("li").index();

                                if (from > to) { // Swap the indices
                                    var tmp = to;
                                    to = from;
                                    from = tmp;
                                }

                                // Make sure we grab all elements since slice excludes the last index
                                ++to;

                                // Change the checkboxes and underlying options
                                var range = this.$ul.find("li").slice(from, to).find("input");

                                range.prop('checked', checked);

                                if (this.options.selectedClass) {
                                    range.closest('li')
                                        .toggleClass(this.options.selectedClass, checked);
                                }

                                for (var i = 0, j = range.length; i < j; i++) {
                                    var $checkbox = $(range[i]);

                                    var $option = this.getOptionByValue($checkbox.val());

                                    $option.prop('selected', checked);
                                }
                            }

                            // Trigger the select "change" event
                            $target.trigger("change");
                        }

                        // Remembers last clicked option
                        if($target.is("input") && !$target.closest("li").is(".multiselect-item")){
                            this.lastToggledInput = $target;
                        }

                        $target.blur();
                    }, this));

                    // Keyboard support.
                    this.$container.off('keydown.multiselect').on('keydown.multiselect', $.proxy(function(event) {
                        if ($('input[type="text"]', this.$container).is(':focus')) {
                            return;
                        }

                        if (event.keyCode === 9 && this.$container.hasClass('open')) {
                            this.$button.click();
                        }
                        else {
                            var $items = $(this.$container).find("li:not(.divider):not(.disabled) a").filter(":visible");

                            if (!$items.length) {
                                return;
                            }

                            var index = $items.index($items.filter(':focus'));

                            // Navigation up.
                            if (event.keyCode === 38 && index > 0) {
                                index--;
                            }
                            // Navigate down.
                            else if (event.keyCode === 40 && index < $items.length - 1) {
                                index++;
                            }
                            else if (!~index) {
                                index = 0;
                            }

                            var $current = $items.eq(index);
                            $current.focus();

                            if (event.keyCode === 32 || event.keyCode === 13) {
                                var $checkbox = $current.find('input');

                                $checkbox.prop("checked", !$checkbox.prop("checked"));
                                $checkbox.change();
                            }

                            event.stopPropagation();
                            event.preventDefault();
                        }
                    }, this));

                    if(this.options.enableClickableOptGroups && this.options.multiple) {
                        $('li.multiselect-group', this.$ul).on('click', $.proxy(function(event) {
                            event.stopPropagation();
                            console.log('test');
                            var group = $(event.target).parent();

                            // Search all option in optgroup
                            var $options = group.nextUntil('li.multiselect-group');
                            var $visibleOptions = $options.filter(":visible:not(.disabled)");

                            // check or uncheck items
                            var allChecked = true;
                            var optionInputs = $visibleOptions.find('input');
                            var values = [];

                            optionInputs.each(function() {
                                allChecked = allChecked && $(this).prop('checked');
                                values.push($(this).val());
                            });

                            if (!allChecked) {
                                this.select(values, false);
                            }
                            else {
                                this.deselect(values, false);
                            }

                            this.options.onChange(optionInputs, !allChecked);
                        }, this));
                    }

                    if (this.options.enableCollapsibleOptGroups && this.options.multiple) {
                        $("li.multiselect-group input", this.$ul).off();
                        $("li.multiselect-group", this.$ul).siblings().not("li.multiselect-group, li.multiselect-all", this.$ul).each( function () {
                            $(this).toggleClass('hidden', true);
                        });

                        $("li.multiselect-group", this.$ul).on("click", $.proxy(function(group) {
                            group.stopPropagation();
                        }, this));

                        $("li.multiselect-group > a > b", this.$ul).on("click", $.proxy(function(t) {
                            t.stopPropagation();
                            var n = $(t.target).closest('li');
                            var r = n.nextUntil("li.multiselect-group");
                            var i = true;

                            r.each(function() {
                                i = i && $(this).hasClass('hidden');
                            });

                            r.toggleClass('hidden', !i);
                        }, this));

                        $("li.multiselect-group > a > input", this.$ul).on("change", $.proxy(function(t) {
                            t.stopPropagation();
                            var n = $(t.target).closest('li');
                            var r = n.nextUntil("li.multiselect-group", ':not(.disabled)');
                            var s = r.find("input");

                            var i = true;
                            s.each(function() {
                                i = i && $(this).prop("checked");
                            });

                            s.prop("checked", !i).trigger("change");
                        }, this));

                        // Set the initial selection state of the groups.
                        $('li.multiselect-group', this.$ul).each(function() {
                            var r = $(this).nextUntil("li.multiselect-group", ':not(.disabled)');
                            var s = r.find("input");

                            var i = true;
                            s.each(function() {
                                i = i && $(this).prop("checked");
                            });

                            $(this).find('input').prop("checked", i);
                        });

                        // Update the group checkbox based on new selections among the
                        // corresponding children.
                        $("li input", this.$ul).on("change", $.proxy(function(t) {
                            t.stopPropagation();
                            var n = $(t.target).closest('li');
                            var r1 = n.prevUntil("li.multiselect-group", ':not(.disabled)');
                            var r2 = n.nextUntil("li.multiselect-group", ':not(.disabled)');
                            var s1 = r1.find("input");
                            var s2 = r2.find("input");

                            var i = $(t.target).prop('checked');
                            s1.each(function() {
                                i = i && $(this).prop("checked");
                            });

                            s2.each(function() {
                                i = i && $(this).prop("checked");
                            });

                            n.prevAll('.multiselect-group').find('input').prop('checked', i);
                        }, this));

                        $("li.multiselect-all", this.$ul).css('background', '#f3f3f3').css('border-bottom', '1px solid #eaeaea');
                        $("li.multiselect-group > a, li.multiselect-all > a > label.checkbox", this.$ul).css('padding', '3px 20px 3px 35px');
                        $("li.multiselect-group > a > input", this.$ul).css('margin', '4px 0px 5px -20px');
                    }
                },

                /**
                 * Create an option using the given select option.
                 *
                 * @param {jQuery} element
                 */
                createOptionValue: function(element) {
                    var $element = $(element);
                    if ($element.is(':selected')) {
                        $element.prop('selected', true);
                    }

                    // Support the label attribute on options.
                    var label = this.options.optionLabel(element);
                    var classes = this.options.optionClass(element);
                    var value = $element.val();
                    var inputType = this.options.multiple ? "checkbox" : "radio";

                    var $li = $(this.options.templates.li);
                    var $label = $('label', $li);
                    $label.addClass(inputType);
                    $li.addClass(classes);

                    if (this.options.enableHTML) {
                        $label.html(" " + label);
                    }
                    else {
                        $label.text(" " + label);
                    }

                    var $checkbox = $('<input/>').attr('type', inputType);

                    if (this.options.checkboxName) {
                        $checkbox.attr('name', this.options.checkboxName);
                    }
                    $label.prepend($checkbox);

                    var selected = $element.prop('selected') || false;
                    $checkbox.val(value);

                    if (value === this.options.selectAllValue) {
                        $li.addClass("multiselect-item multiselect-all");
                        $checkbox.parent().parent()
                            .addClass('multiselect-all');
                    }

                    $label.attr('title', $element.attr('title'));

                    this.$ul.append($li);

                    if ($element.is(':disabled')) {
                        $checkbox.attr('disabled', 'disabled')
                            .prop('disabled', true)
                            .closest('a')
                            .attr("tabindex", "-1")
                            .closest('li')
                            .addClass('disabled');
                    }

                    $checkbox.prop('checked', selected);

                    if (selected && this.options.selectedClass) {
                        $checkbox.closest('li')
                            .addClass(this.options.selectedClass);
                    }
                },

                /**
                 * Creates a divider using the given select option.
                 *
                 * @param {jQuery} element
                 */
                createDivider: function(element) {
                    var $divider = $(this.options.templates.divider);
                    this.$ul.append($divider);
                },

                /**
                 * Creates an optgroup.
                 *
                 * @param {jQuery} group
                 */
                createOptgroup: function(group) {
                    if (this.options.enableCollapsibleOptGroups && this.options.multiple) {
                        var label = $(group).attr("label");
                        var value = $(group).attr("value");
                        var r = $('<li class="multiselect-item multiselect-group"><a href="javascript:void(0);"><input type="checkbox" value="' + value + '"/><b> ' + label + '<b class="caret"></b></b></a></li>');

                        if (this.options.enableClickableOptGroups) {
                            r.addClass("multiselect-group-clickable")
                        }
                        this.$ul.append(r);
                        if ($(group).is(":disabled")) {
                            r.addClass("disabled")
                        }
                        $("option", group).each($.proxy(function($, group) {
                            this.createOptionValue(group)
                        }, this))
                    }
                    else {
                        var groupName = $(group).prop('label');

                        // Add a header for the group.
                        var $li = $(this.options.templates.liGroup);

                        if (this.options.enableHTML) {
                            $('label', $li).html(groupName);
                        }
                        else {
                            $('label', $li).text(groupName);
                        }

                        if (this.options.enableClickableOptGroups) {
                            $li.addClass('multiselect-group-clickable');
                        }

                        this.$ul.append($li);

                        if ($(group).is(':disabled')) {
                            $li.addClass('disabled');
                        }

                        // Add the options of the group.
                        $('option', group).each($.proxy(function(index, element) {
                            this.createOptionValue(element);
                        }, this));
                    }
                },

                /**
                 * Build the select all.
                 *
                 * Checks if a select all has already been created.
                 */
                buildSelectAll: function() {
                    if (typeof this.options.selectAllValue === 'number') {
                        this.options.selectAllValue = this.options.selectAllValue.toString();
                    }

                    var alreadyHasSelectAll = this.hasSelectAll();

                    if (!alreadyHasSelectAll && this.options.includeSelectAllOption && this.options.multiple
                        && $('option', this.$select).length > this.options.includeSelectAllIfMoreThan) {

                        // Check whether to add a divider after the select all.
                        if (this.options.includeSelectAllDivider) {
                            this.$ul.prepend($(this.options.templates.divider));
                        }

                        var $li = $(this.options.templates.li);
                        $('label', $li).addClass("checkbox");

                        if (this.options.enableHTML) {
                            $('label', $li).html(" " + this.options.selectAllText);
                        }
                        else {
                            $('label', $li).text(" " + this.options.selectAllText);
                        }

                        if (this.options.selectAllName) {
                            $('label', $li).prepend('<input type="checkbox" name="' + this.options.selectAllName + '" />');
                        }
                        else {
                            $('label', $li).prepend('<input type="checkbox" />');
                        }

                        var $checkbox = $('input', $li);
                        $checkbox.val(this.options.selectAllValue);

                        $li.addClass("multiselect-item multiselect-all");
                        $checkbox.parent().parent()
                            .addClass('multiselect-all');

                        this.$ul.prepend($li);

                        $checkbox.prop('checked', false);
                    }
                },

                /**
                 * Builds the filter.
                 */
                buildFilter: function() {

                    // Build filter if filtering OR case insensitive filtering is enabled and the number of options exceeds (or equals) enableFilterLength.
                    if (this.options.enableFiltering || this.options.enableCaseInsensitiveFiltering) {
                        var enableFilterLength = Math.max(this.options.enableFiltering, this.options.enableCaseInsensitiveFiltering);

                        if (this.$select.find('option').length >= enableFilterLength) {

                            this.$filter = $(this.options.templates.filter);
                            $('input', this.$filter).attr('placeholder', this.options.filterPlaceholder);

                            // Adds optional filter clear button
                            if(this.options.includeFilterClearBtn){
                                var clearBtn = $(this.options.templates.filterClearBtn);
                                clearBtn.on('click', $.proxy(function(event){
                                    clearTimeout(this.searchTimeout);
                                    this.$filter.find('.multiselect-search').val('');
                                    $('li', this.$ul).show().removeClass("filter-hidden");
                                    this.updateSelectAll();
                                }, this));
                                this.$filter.find('.input-group').append(clearBtn);
                            }

                            this.$ul.prepend(this.$filter);

                            this.$filter.val(this.query).on('click', function(event) {
                                event.stopPropagation();
                            }).on('input keydown', $.proxy(function(event) {
                                // Cancel enter key default behaviour
                                if (event.which === 13) {
                                    event.preventDefault();
                                }

                                // This is useful to catch "keydown" events after the browser has updated the control.
                                clearTimeout(this.searchTimeout);

                                this.searchTimeout = this.asyncFunction($.proxy(function() {

                                    if (this.query !== event.target.value) {
                                        this.query = event.target.value;

                                        var currentGroup, currentGroupVisible;
                                        $.each($('li', this.$ul), $.proxy(function(index, element) {
                                            var value = $('input', element).length > 0 ? $('input', element).val() : "";
                                            var text = $('label', element).text();

                                            var filterCandidate = '';
                                            if ((this.options.filterBehavior === 'text')) {
                                                filterCandidate = text;
                                            }
                                            else if ((this.options.filterBehavior === 'value')) {
                                                filterCandidate = value;
                                            }
                                            else if (this.options.filterBehavior === 'both') {
                                                filterCandidate = text + '\n' + value;
                                            }

                                            if (value !== this.options.selectAllValue && text) {

                                                // By default lets assume that element is not
                                                // interesting for this search.
                                                var showElement = false;

                                                if (this.options.enableCaseInsensitiveFiltering) {
                                                    filterCandidate = filterCandidate.toLowerCase();
                                                    this.query = this.query.toLowerCase();
                                                }

                                                if (this.options.enableFullValueFiltering && this.options.filterBehavior !== 'both') {
                                                    var valueToMatch = filterCandidate.trim().substring(0, this.query.length);
                                                    if (this.query.indexOf(valueToMatch) > -1) {
                                                        showElement = true;
                                                    }
                                                }
                                                else if (filterCandidate.indexOf(this.query) > -1) {
                                                    showElement = true;
                                                }

                                                // Toggle current element (group or group item) according to showElement boolean.
                                                $(element).toggle(showElement).toggleClass('filter-hidden', !showElement);

                                                // Differentiate groups and group items.
                                                if ($(element).hasClass('multiselect-group')) {
                                                    // Remember group status.
                                                    currentGroup = element;
                                                    currentGroupVisible = showElement;
                                                }
                                                else {
                                                    // Show group name when at least one of its items is visible.
                                                    if (showElement) {
                                                        $(currentGroup).show().removeClass('filter-hidden');
                                                    }

                                                    // Show all group items when group name satisfies filter.
                                                    if (!showElement && currentGroupVisible) {
                                                        $(element).show().removeClass('filter-hidden');
                                                    }
                                                }
                                            }
                                        }, this));
                                    }

                                    this.updateSelectAll();
                                }, this), 300, this);
                            }, this));
                        }
                    }
                },

                /**
                 * Unbinds the whole plugin.
                 */
                destroy: function() {
                    this.$container.remove();
                    this.$select.show();
                    this.$select.data('multiselect', null);
                },

                /**
                 * Refreshs the multiselect based on the selected options of the select.
                 */
                refresh: function () {
                    var inputs = $.map($('li input', this.$ul), $);

                    $('option', this.$select).each($.proxy(function (index, element) {
                        var $elem = $(element);
                        var value = $elem.val();
                        var $input;
                        for (var i = inputs.length; 0 < i--; /**/) {
                            if (value !== ($input = inputs[i]).val())
                                continue; // wrong li

                            if ($elem.is(':selected')) {
                                $input.prop('checked', true);

                                if (this.options.selectedClass) {
                                    $input.closest('li')
                                        .addClass(this.options.selectedClass);
                                }
                            }
                            else {
                                $input.prop('checked', false);

                                if (this.options.selectedClass) {
                                    $input.closest('li')
                                        .removeClass(this.options.selectedClass);
                                }
                            }

                            if ($elem.is(":disabled")) {
                                $input.attr('disabled', 'disabled')
                                    .prop('disabled', true)
                                    .closest('li')
                                    .addClass('disabled');
                            }
                            else {
                                $input.prop('disabled', false)
                                    .closest('li')
                                    .removeClass('disabled');
                            }
                            break; // assumes unique values
                        }
                    }, this));

                    this.updateButtonText();
                    this.updateSelectAll();
                },

                /**
                 * Select all options of the given values.
                 *
                 * If triggerOnChange is set to true, the on change event is triggered if
                 * and only if one value is passed.
                 *
                 * @param {Array} selectValues
                 * @param {Boolean} triggerOnChange
                 */
                select: function(selectValues, triggerOnChange) {
                    if(!$.isArray(selectValues)) {
                        selectValues = [selectValues];
                    }

                    for (var i = 0; i < selectValues.length; i++) {
                        var value = selectValues[i];

                        if (value === null || value === undefined) {
                            continue;
                        }

                        var $option = this.getOptionByValue(value);
                        var $checkbox = this.getInputByValue(value);

                        if($option === undefined || $checkbox === undefined) {
                            continue;
                        }

                        if (!this.options.multiple) {
                            this.deselectAll(false);
                        }

                        if (this.options.selectedClass) {
                            $checkbox.closest('li')
                                .addClass(this.options.selectedClass);
                        }

                        $checkbox.prop('checked', true);
                        $option.prop('selected', true);

                        if (triggerOnChange) {
                            this.options.onChange($option, true);
                        }
                    }

                    this.updateButtonText();
                    this.updateSelectAll();
                },

                /**
                 * Clears all selected items.
                 */
                clearSelection: function () {
                    this.deselectAll(false);
                    this.updateButtonText();
                    this.updateSelectAll();
                },

                /**
                 * Deselects all options of the given values.
                 *
                 * If triggerOnChange is set to true, the on change event is triggered, if
                 * and only if one value is passed.
                 *
                 * @param {Array} deselectValues
                 * @param {Boolean} triggerOnChange
                 */
                deselect: function(deselectValues, triggerOnChange) {
                    if(!$.isArray(deselectValues)) {
                        deselectValues = [deselectValues];
                    }

                    for (var i = 0; i < deselectValues.length; i++) {
                        var value = deselectValues[i];

                        if (value === null || value === undefined) {
                            continue;
                        }

                        var $option = this.getOptionByValue(value);
                        var $checkbox = this.getInputByValue(value);

                        if($option === undefined || $checkbox === undefined) {
                            continue;
                        }

                        if (this.options.selectedClass) {
                            $checkbox.closest('li')
                                .removeClass(this.options.selectedClass);
                        }

                        $checkbox.prop('checked', false);
                        $option.prop('selected', false);

                        if (triggerOnChange) {
                            this.options.onChange($option, false);
                        }
                    }

                    this.updateButtonText();
                    this.updateSelectAll();
                },

                /**
                 * Selects all enabled & visible options.
                 *
                 * If justVisible is true or not specified, only visible options are selected.
                 *
                 * @param {Boolean} justVisible
                 * @param {Boolean} triggerOnSelectAll
                 */
                selectAll: function (justVisible, triggerOnSelectAll) {
                    justVisible = (this.options.enableCollapsibleOptGroups && this.options.multiple) ? false : justVisible;

                    var justVisible = typeof justVisible === 'undefined' ? true : justVisible;
                    var allCheckboxes = $("li input[type='checkbox']:enabled", this.$ul);
                    var visibleCheckboxes = allCheckboxes.filter(":visible");
                    var allCheckboxesCount = allCheckboxes.length;
                    var visibleCheckboxesCount = visibleCheckboxes.length;

                    if(justVisible) {
                        visibleCheckboxes.prop('checked', true);
                        $("li:not(.divider):not(.disabled)", this.$ul).filter(":visible").addClass(this.options.selectedClass);
                    }
                    else {
                        allCheckboxes.prop('checked', true);
                        $("li:not(.divider):not(.disabled)", this.$ul).addClass(this.options.selectedClass);
                    }

                    if (allCheckboxesCount === visibleCheckboxesCount || justVisible === false) {
                        $("option:not([data-role='divider']):enabled", this.$select).prop('selected', true);
                    }
                    else {
                        var values = visibleCheckboxes.map(function() {
                            return $(this).val();
                        }).get();

                        $("option:enabled", this.$select).filter(function(index) {
                            return $.inArray($(this).val(), values) !== -1;
                        }).prop('selected', true);
                    }

                    if (triggerOnSelectAll) {
                        this.options.onSelectAll();
                    }
                },

                /**
                 * Deselects all options.
                 *
                 * If justVisible is true or not specified, only visible options are deselected.
                 *
                 * @param {Boolean} justVisible
                 */
                deselectAll: function (justVisible) {
                    justVisible = (this.options.enableCollapsibleOptGroups && this.options.multiple) ? false : justVisible;
                    justVisible = typeof justVisible === 'undefined' ? true : justVisible;

                    if(justVisible) {
                        var visibleCheckboxes = $("li input[type='checkbox']:not(:disabled)", this.$ul).filter(":visible");
                        visibleCheckboxes.prop('checked', false);

                        var values = visibleCheckboxes.map(function() {
                            return $(this).val();
                        }).get();

                        $("option:enabled", this.$select).filter(function(index) {
                            return $.inArray($(this).val(), values) !== -1;
                        }).prop('selected', false);

                        if (this.options.selectedClass) {
                            $("li:not(.divider):not(.disabled)", this.$ul).filter(":visible").removeClass(this.options.selectedClass);
                        }
                    }
                    else {
                        $("li input[type='checkbox']:enabled", this.$ul).prop('checked', false);
                        $("option:enabled", this.$select).prop('selected', false);

                        if (this.options.selectedClass) {
                            $("li:not(.divider):not(.disabled)", this.$ul).removeClass(this.options.selectedClass);
                        }
                    }
                },

                /**
                 * Rebuild the plugin.
                 *
                 * Rebuilds the dropdown, the filter and the select all option.
                 */
                rebuild: function() {
                    this.$ul.html('');

                    // Important to distinguish between radios and checkboxes.
                    this.options.multiple = this.$select.attr('multiple') === "multiple";

                    this.buildSelectAll();
                    this.buildDropdownOptions();
                    this.buildFilter();

                    this.updateButtonText();
                    this.updateSelectAll(true);

                    if (this.options.disableIfEmpty && $('option', this.$select).length <= 0) {
                        this.disable();
                    }
                    else {
                        this.enable();
                    }

                    if (this.options.dropRight) {
                        this.$ul.addClass('pull-right');
                    }
                },

                /**
                 * The provided data will be used to build the dropdown.
                 */
                dataprovider: function(dataprovider) {

                    var groupCounter = 0;
                    var $select = this.$select.empty();

                    $.each(dataprovider, function (index, option) {
                        var $tag;

                        if ($.isArray(option.children)) { // create optiongroup tag
                            groupCounter++;

                            $tag = $('<optgroup/>').attr({
                                label: option.label || 'Group ' + groupCounter,
                                disabled: !!option.disabled
                            });

                            forEach(option.children, function(subOption) { // add children option tags
                                $tag.append($('<option/>').attr({
                                    value: subOption.value,
                                    label: subOption.label || subOption.value,
                                    title: subOption.title,
                                    selected: !!subOption.selected,
                                    disabled: !!subOption.disabled
                                }));
                            });
                        }
                        else {
                            $tag = $('<option/>').attr({
                                value: option.value,
                                label: option.label || option.value,
                                title: option.title,
                                class: option.class,
                                selected: !!option.selected,
                                disabled: !!option.disabled
                            });
                            $tag.text(option.label || option.value);
                        }

                        $select.append($tag);
                    });

                    this.rebuild();
                },

                /**
                 * Enable the multiselect.
                 */
                enable: function() {
                    this.$select.prop('disabled', false);
                    this.$button.prop('disabled', false)
                        .removeClass('disabled');
                },

                /**
                 * Disable the multiselect.
                 */
                disable: function() {
                    this.$select.prop('disabled', true);
                    this.$button.prop('disabled', true)
                        .addClass('disabled');
                },

                /**
                 * Set the options.
                 *
                 * @param {Array} options
                 */
                setOptions: function(options) {
                    this.options = this.mergeOptions(options);
                },

                /**
                 * Merges the given options with the default options.
                 *
                 * @param {Array} options
                 * @returns {Array}
                 */
                mergeOptions: function(options) {
                    return $.extend(true, {}, this.defaults, this.options, options);
                },

                /**
                 * Checks whether a select all checkbox is present.
                 *
                 * @returns {Boolean}
                 */
                hasSelectAll: function() {
                    return $('li.multiselect-all', this.$ul).length > 0;
                },

                /**
                 * Updates the select all checkbox based on the currently displayed and selected checkboxes.
                 */
                updateSelectAll: function(notTriggerOnSelectAll) {
                    if (this.hasSelectAll()) {
                        var allBoxes = $("li:not(.multiselect-item):not(.filter-hidden) input:enabled", this.$ul);
                        var allBoxesLength = allBoxes.length;
                        var checkedBoxesLength = allBoxes.filter(":checked").length;
                        var selectAllLi  = $("li.multiselect-all", this.$ul);
                        var selectAllInput = selectAllLi.find("input");

                        if (checkedBoxesLength > 0 && checkedBoxesLength === allBoxesLength) {
                            selectAllInput.prop("checked", true);
                            selectAllLi.addClass(this.options.selectedClass);
                            this.options.onSelectAll(true);
                        }
                        else {
                            selectAllInput.prop("checked", false);
                            selectAllLi.removeClass(this.options.selectedClass);
                            if (checkedBoxesLength === 0) {
                                if (!notTriggerOnSelectAll) {
                                    this.options.onSelectAll(false);
                                }
                            }
                        }
                    }
                },

                /**
                 * Update the button text and its title based on the currently selected options.
                 */
                updateButtonText: function() {
                    var options = this.getSelected();

                    // First update the displayed button text.
                    if (this.options.enableHTML) {
                        $('.multiselect .multiselect-selected-text', this.$container).html(this.options.buttonText(options, this.$select));
                    }
                    else {
                        $('.multiselect .multiselect-selected-text', this.$container).text(this.options.buttonText(options, this.$select));
                    }

                    // Now update the title attribute of the button.
                    $('.multiselect', this.$container).attr('title', this.options.buttonTitle(options, this.$select));
                },

                /**
                 * Get all selected options.
                 *
                 * @returns {jQUery}
                 */
                getSelected: function() {
                    return $('option', this.$select).filter(":selected");
                },

                /**
                 * Gets a select option by its value.
                 *
                 * @param {String} value
                 * @returns {jQuery}
                 */
                getOptionByValue: function (value) {

                    var options = $('option', this.$select);
                    var valueToCompare = value.toString();

                    for (var i = 0; i < options.length; i = i + 1) {
                        var option = options[i];
                        if (option.value === valueToCompare) {
                            return $(option);
                        }
                    }
                },

                /**
                 * Get the input (radio/checkbox) by its value.
                 *
                 * @param {String} value
                 * @returns {jQuery}
                 */
                getInputByValue: function (value) {

                    var checkboxes = $('li input', this.$ul);
                    var valueToCompare = value.toString();

                    for (var i = 0; i < checkboxes.length; i = i + 1) {
                        var checkbox = checkboxes[i];
                        if (checkbox.value === valueToCompare) {
                            return $(checkbox);
                        }
                    }
                },

                /**
                 * Used for knockout integration.
                 */
                updateOriginalOptions: function() {
                    this.originalOptions = this.$select.clone()[0].options;
                },

                asyncFunction: function(callback, timeout, self) {
                    var args = Array.prototype.slice.call(arguments, 3);
                    return setTimeout(function() {
                        callback.apply(self || window, args);
                    }, timeout);
                },

                setAllSelectedText: function(allSelectedText) {
                    this.options.allSelectedText = allSelectedText;
                    this.updateButtonText();
                }
            };

            $.fn.multiselect = function(option, parameter, extraOptions) {
                return this.each(function() {
                    var data = $(this).data('multiselect');
                    var options = typeof option === 'object' && option;

                    // Initialize the multiselect.
                    if (!data) {
                        data = new Multiselect(this, options);
                        $(this).data('multiselect', data);
                    }

                    // Call multiselect method.
                    if (typeof option === 'string') {
                        data[option](parameter, extraOptions);

                        if (option === 'destroy') {
                            $(this).data('multiselect', false);
                        }
                    }
                });
            };

            $.fn.multiselect.Constructor = Multiselect;

            $(function() {
                $("select[data-role=multiselect]").multiselect();
            });

        }(window.jQuery);


    </script>

    <script src="{{asset('admin/main.js')}}"></script>
@endsection

