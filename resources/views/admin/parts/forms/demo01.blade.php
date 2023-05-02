@extends('layouts.admin-base')
@section('content')
    <div class="row">
        <!-- Dashboard Box -->
        <div class="col-xl-12">
            <div class="dashboard-box margin-top-0">
                <!-- Headline -->
                <div class="headline">
                    <h3><i class="icon-feather-settings"></i> Account Setting</h3>
                </div>
                <div class="content with-padding">
                    <form method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="submit-field">
                                    <h5>Avatar</h5>
                                    <div class="uploadButton">
                                        <input class="uploadButton-input" type="file" accept="images/*" id="avatar" name="avatar">
                                        <label class="uploadButton-button ripple-effect" for="avatar">Upload Avatar</label>
                                        <span class="uploadButton-file-name">Use 150x150px for better use</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-12">
                                <div class="submit-field">
                                    <h5>Username *</h5>
                                    <div class="input-with-icon-left">
                                        <i class="la la-user"></i>
                                        <input type="text" class="with-border" id="username" name="username" value="devtiagofranca"
                                            onblur="checkAvailabilityUsername()">
                                    </div>
                                    <span id="user-availability-status"></span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-12">
                                <div class="submit-field">
                                    <h5>Email Address *</h5>
                                    <div class="input-with-icon-left">
                                        <i class="la la-envelope"></i>
                                        <input type="text" class="with-border" id="email" name="email" value="devtiagofranca@gmail.com"
                                            onblur="checkAvailabilityEmail()">
                                    </div>
                                    <span id="email-availability-status"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="submit-field">
                                    <h5>New Password</h5>
                                    <input type="password" id="password" name="password" class="with-border"
                                        onkeyup="checkAvailabilityPassword()">
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="submit-field">
                                    <h5>Confirm Password</h5>
                                    <input type="password" id="re_password" name="re_password" class="with-border" onkeyup="checkRePassword()">
                                </div>
                            </div>
                        </div>
                        <span id="password-availability-status"></span>
                        <button type="submit" name="submit" class="button ripple-effect">Save Changes</button>
                    </form>
                </div>
            </div>
            <div class="dashboard-box">
                <div class="headline">
                    <h3><i class="icon-material-outline-description"></i> Billing Details</h3>
                </div>
                <div class="content">
                    <div class="content with-padding">
                        <div class="notification notice">These details will be used in invoice and payments.</div>
                        <form method="post" accept-charset="UTF-8">
                            <div class="submit-field">
                                <h5>Type</h5>
                                <div class="btn-group bootstrap-select with-border"><button type="button"
                                        class="btn dropdown-toggle btn-default" data-toggle="dropdown" role="button"
                                        data-id="billing_details_type" title="Personal"><span
                                            class="filter-option pull-left">Personal</span>&nbsp;<span class="bs-caret"><span
                                                class="caret"></span></span></button>
                                    <div class="dropdown-menu open" role="combobox">
                                        <ul class="dropdown-menu inner" role="listbox" aria-expanded="false">
                                            <li data-original-index="0" class="selected"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="true"><span
                                                        class="text">Personal</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option"
                                                    aria-disabled="false" aria-selected="false"><span class="text">Business</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                        </ul>
                                    </div><select name="billing_details_type" id="billing_details_type" class="with-border selectpicker"
                                        required="" tabindex="-98">
                                        <option value="personal">Personal</option>
                                        <option value="business">Business</option>
                                    </select>
                                </div>
                            </div>
                            <div class="submit-field billing-tax-id" style="display: none;">
                                <h5>
                                    Tax ID </h5>
                                <input type="text" id="billing_tax_id" name="billing_tax_id" class="with-border" value="">
                            </div>
                            <div class="submit-field">
                                <h5>Name *</h5>
                                <input type="text" id="billing_name" name="billing_name" class="with-border" value=""
                                    required="">
                            </div>
                            <div class="submit-field">
                                <h5>Address *</h5>
                                <input type="text" id="billing_address" name="billing_address" class="with-border" value=""
                                    required="">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="submit-field">
                                        <h5>City *</h5>
                                        <input type="text" id="billing_city" name="billing_city" class="with-border" value=""
                                            required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="submit-field">
                                        <h5>State *</h5>
                                        <input type="text" id="billing_state" name="billing_state" class="with-border" value=""
                                            required="">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="submit-field">
                                        <h5>Zip code *</h5>
                                        <input type="text" id="billing_zipcode" name="billing_zipcode" class="with-border"
                                            value="" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-field">
                                <h5>Country *</h5>
                                <div class="btn-group bootstrap-select with-border dropup">
                                    <div class="dropdown-menu open" role="combobox"
                                        style="max-height: 1011.5px; overflow: hidden; min-height: 161px;">
                                        <div class="bs-searchbox"><input type="text" class="form-control" autocomplete="off"
                                                role="textbox" aria-label="Search"></div>
                                        <ul class="dropdown-menu inner" role="listbox" aria-expanded="false"
                                            style="max-height: 951.5px; overflow-y: auto; min-height: 101px;">
                                            <li data-original-index="0" class="active"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Afghanistan</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="1" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span class="text">Aland
                                                        Islands</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="2" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Albania</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="3" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Algeria</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="4" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span class="text">American
                                                        Samoa</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="5" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Andorra</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="6" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Angola</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="7" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Anguilla</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="8"><a tabindex="0" class="" data-tokens="null" role="option"
                                                    aria-disabled="false" aria-selected="false"><span class="text">Antarctica</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="9" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span class="text">Antigua
                                                        and Barbuda</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="10" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Argentina</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="11" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Armenia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="12" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Aruba</span><span class="glyphicon glyphicon-ok check-mark"></span></a>
                                            </li>
                                            <li data-original-index="13" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Australia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="14" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Austria</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="15" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Azerbaijan</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="16" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Bahamas</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="17" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Bahrain</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="18" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Bangladesh</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="19" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Barbados</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="20" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Belarus</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="21" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Belgium</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="22" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Belize</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="23" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Benin</span><span class="glyphicon glyphicon-ok check-mark"></span></a>
                                            </li>
                                            <li data-original-index="24" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Bermuda</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="25"><a tabindex="0" class="" data-tokens="null" role="option"
                                                    aria-disabled="false" aria-selected="false"><span class="text">Bhutan</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="26" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Bolivia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="27"><a tabindex="0" class="" data-tokens="null" role="option"
                                                    aria-disabled="false" aria-selected="false"><span class="text">Bonaire, Saint Eustatius
                                                        and Saba </span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="28" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span class="text">Bosnia
                                                        and Herzegovina</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="29" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Botswana</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="30" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span class="text">Bouvet
                                                        Island</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="31" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Brazil</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="32" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span class="text">British
                                                        Indian Ocean Territory</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="33" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span class="text">British
                                                        Virgin Islands</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="34" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Brunei</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="35" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Bulgaria</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="36" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span class="text">Burkina
                                                        Faso</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="37" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Burundi</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="38" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Cambodia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="39" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Cameroon</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="40" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Canada</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="41" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span class="text">Cape
                                                        Verde</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="42" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span class="text">Cayman
                                                        Islands</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="43" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span class="text">Central
                                                        African Republic</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="44" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Chad</span><span class="glyphicon glyphicon-ok check-mark"></span></a>
                                            </li>
                                            <li data-original-index="45" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Chile</span><span class="glyphicon glyphicon-ok check-mark"></span></a>
                                            </li>
                                            <li data-original-index="46" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">China</span><span class="glyphicon glyphicon-ok check-mark"></span></a>
                                            </li>
                                            <li data-original-index="47" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Christmas Island</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="48" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span class="text">Cocos
                                                        Islands</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="49" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Colombia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="50" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Comoros</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="51" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span class="text">Cook
                                                        Islands</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="52"><a tabindex="0" class="" data-tokens="null" role="option"
                                                    aria-disabled="false" aria-selected="false"><span class="text">Costa Rica</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="53" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Croatia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="54" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Cuba</span><span class="glyphicon glyphicon-ok check-mark"></span></a>
                                            </li>
                                            <li data-original-index="55" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Curacao</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="56" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Cyprus</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="57" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span class="text">Czech
                                                        Republic</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="58" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Democratic Republic of the Congo</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="59" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Denmark</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="60" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Djibouti</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="61" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Dominica</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="62" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Dominican Republic</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="63" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span class="text">East
                                                        Timor</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="64" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Ecuador</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="65" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Egypt</span><span class="glyphicon glyphicon-ok check-mark"></span></a>
                                            </li>
                                            <li data-original-index="66" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span class="text">El
                                                        Salvador</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="67" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Equatorial Guinea</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="68" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Eritrea</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="69" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Estonia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="70" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Ethiopia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="71" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span class="text">Falkland
                                                        Islands</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="72" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span class="text">Faroe
                                                        Islands</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="73" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Fiji</span><span class="glyphicon glyphicon-ok check-mark"></span></a>
                                            </li>
                                            <li data-original-index="74" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Finland</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="75" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">France</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="76" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span class="text">French
                                                        Guiana</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="77" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span class="text">French
                                                        Polynesia</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="78" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span class="text">French
                                                        Southern Territories</span><span class="glyphicon glyphicon-ok check-mark"></span></a>
                                            </li>
                                            <li data-original-index="79" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Gabon</span><span class="glyphicon glyphicon-ok check-mark"></span></a>
                                            </li>
                                            <li data-original-index="80" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Gambia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="81" class="hidden"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Georgia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="82" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Germany</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="83" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Ghana</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="84"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Gibraltar</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="85" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Greece</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="86" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Greenland</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="87" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Grenada</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="88" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Guadeloupe</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="89" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Guam</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="90" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Guatemala</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="91" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Guernsey</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="92" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Guinea</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="93" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Guinea-Bissau</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="94" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Guyana</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="95" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Haiti</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="96" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Heard Island and McDonald Islands</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="97" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Honduras</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="98" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Hong Kong</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="99" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Hungary</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="100" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Iceland</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="101" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">India</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="102" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Indonesia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="103" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Iran</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="104" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Iraq</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="105" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Ireland</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="106" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Isle of Man</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="107" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Israel</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="108"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Italy</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="109" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Ivory Coast</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="110" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Jamaica</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="111" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Japan</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="112" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Jersey</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="113" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Jordan</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="114"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Kazakhstan</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="115" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Kenya</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="116" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Kiribati</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="117" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Kosovo</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="118" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Kuwait</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="119"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Kyrgyzstan</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="120" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Laos</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="121" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Latvia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="122" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Lebanon</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="123" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Lesotho</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="124" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Liberia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="125" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Libya</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="126" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Liechtenstein</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="127" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Lithuania</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="128" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Luxembourg</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="129" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Macao</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="130" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Macedonia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="131" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Madagascar</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="132" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Malawi</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="133" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Malaysia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="134" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Maldives</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="135" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Mali</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="136"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Malta</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="137" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Marshall Islands</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="138" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Martinique</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="139"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Mauritania</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="140" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Mauritius</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="141" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Mayotte</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="142" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Mexico</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="143" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Micronesia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="144" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Moldova</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="145" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Monaco</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="146" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Mongolia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="147" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Montenegro</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="148" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Montserrat</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="149" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Morocco</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="150" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Mozambique</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="151" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Myanmar</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="152" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Namibia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="153" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Nauru</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="154" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Nepal</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="155" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Netherlands</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="156" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Netherlands Antilles</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="157" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">New Caledonia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="158" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">New Zealand</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="159" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Nicaragua</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="160" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Niger</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="161" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Nigeria</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="162" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Niue</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="163" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Norfolk Island</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="164" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">North Korea</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="165" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Northern Mariana Islands</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="166" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Norway</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="167" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Oman</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="168"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Pakistan</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="169" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Palau</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="170" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Palestinian Territory</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="171" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Panama</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="172" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Papua New Guinea</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="173" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Paraguay</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="174" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Peru</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="175" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Philippines</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="176" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Pitcairn</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="177" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Poland</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="178" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Portugal</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="179" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Puerto Rico</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="180"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Qatar</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="181" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Republic of the Congo</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="182" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Reunion</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="183" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Romania</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="184" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Russia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="185" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Rwanda</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="186" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Saint Barthelemy</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="187" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Saint Helena</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="188" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Saint Kitts and Nevis</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="189" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Saint Lucia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="190" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Saint Martin</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="191" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Saint Pierre and Miquelon</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="192" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Saint Vincent and the Grenadines</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="193" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Samoa</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="194" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">San Marino</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="195" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Sao Tome and Principe</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="196" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Saudi Arabia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="197" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Senegal</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="198" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Serbia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="199" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Serbia and Montenegro</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="200" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Seychelles</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="201" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Sierra Leone</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="202" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Singapore</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="203" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Sint Maarten</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="204" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Slovakia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="205" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Slovenia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="206" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Solomon Islands</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="207" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Somalia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="208" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">South Africa</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="209" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">South Georgia and the South Sandwich Islands</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="210" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">South Korea</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="211" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">South Sudan</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="212" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Spain</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="213" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Sri Lanka</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="214" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Sudan</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="215" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Suriname</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="216" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Svalbard and Jan Mayen</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="217" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Swaziland</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="218" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Sweden</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="219" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Switzerland</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="220" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Syria</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="221"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Taiwan</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="222"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Tajikistan</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="223"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Tanzania</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="224" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Thailand</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="225" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Togo</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="226" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Tokelau</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="227" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Tonga</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="228" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Trinidad and Tobago</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="229" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Tunisia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="230" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Turkey</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="231"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Turkmenistan</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="232" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Turks and Caicos Islands</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="233" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Tuvalu</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="234" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">U.S. Virgin Islands</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="235" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Uganda</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="236" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Ukraine</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="237" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">United Arab Emirates</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="238" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">United Kingdom</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="239" class="selected"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span
                                                        class="text">United States</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="240"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">United States Minor Outlying Islands</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="241" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Uruguay</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="242"><a tabindex="0" class="" data-tokens="null"
                                                    role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Uzbekistan</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="243" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Vanuatu</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="244" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Vatican</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="245" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Venezuela</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="246" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Vietnam</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="247" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Wallis and Futuna</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="248" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Western Sahara</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="249" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Yemen</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="250" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Zambia</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            <li data-original-index="251" class="hidden"><a tabindex="0" class=""
                                                    data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span
                                                        class="text">Zimbabwe</span><span
                                                        class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                        </ul>
                                    </div><select name="billing_country" id="billing_country" class="with-border selectpicker"
                                        data-live-search="true" required="" tabindex="-98">
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Aland Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia</option>
                                        <option value="BQ">Bonaire, Saint Eustatius and Saba </option>
                                        <option value="BA">Bosnia and Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BV">Bouvet Island</option>
                                        <option value="BR">Brazil</option>
                                        <option value="IO">British Indian Ocean Territory</option>
                                        <option value="VG">British Virgin Islands</option>
                                        <option value="BN">Brunei</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CW">Curacao</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="CD">Democratic Republic of the Congo</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="TL">East Timor</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="TF">French Southern Territories</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GU">Guam</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GG">Guernsey</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HM">Heard Island and McDonald Islands</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IM">Isle of Man</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="CI">Ivory Coast</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JE">Jersey</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="XK">Kosovo</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Laos</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macao</option>
                                        <option value="MK">Macedonia</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia</option>
                                        <option value="MD">Moldova</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="AN">Netherlands Antilles</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="KP">North Korea</option>
                                        <option value="MP">Northern Mariana Islands</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="PW">Palau</option>
                                        <option value="PS">Palestinian Territory</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="QA">Qatar</option>
                                        <option value="CG">Republic of the Congo</option>
                                        <option value="RE">Reunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russia</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="BL">Saint Barthelemy</option>
                                        <option value="SH">Saint Helena</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="MF">Saint Martin</option>
                                        <option value="PM">Saint Pierre and Miquelon</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="WS">Samoa</option>
                                        <option value="SM">San Marino</option>
                                        <option value="ST">Sao Tome and Principe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="CS">Serbia and Montenegro</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SX">Sint Maarten</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                        <option value="KR">South Korea</option>
                                        <option value="SS">South Sudan</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syria</option>
                                        <option value="TW">Taiwan</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">Tokelau</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="VI">U.S. Virgin Islands</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="UK">United Kingdom</option>
                                        <option value="US" selected="">United States</option>
                                        <option value="UM">United States Minor Outlying Islands</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VA">Vatican</option>
                                        <option value="VE">Venezuela</option>
                                        <option value="VN">Vietnam</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" name="billing-submit" class="button ripple-effect">Save Changes</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
