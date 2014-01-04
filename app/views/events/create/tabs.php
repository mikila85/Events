<div class="event_content">
    <div class="new_shadetabs">
        <ul id="countrytabs">
            <li><a href="#" rel="country1" class="selected">Edit</a></li>
            <li><a href="#" rel="country2" class="">Dashboard</a></li>
            <li><a href="#" rel="country3" class="">Manage</a></li>
        </ul>
    </div>

    <div class="new_tab_content_holder">
        <div id="country1" style="display: block;">
            <div class="edit_form">
                <h3>Event #: 12345678931</h3>

                <div class="edit_form_content">
                    <div class="form_text">* Name of event up to 70 characters:<br><input name="name" type="text" class="size1" name="name">
                        <a href="#"><img src="/images/create-event-ico1.png" alt=""></a></div>
                    <div class="form_text">* Short description of event up to 140 characters:<br><textarea name="description" cols="37" rows="4"></textarea>
                    </div>
                    <div class="form_text">
                        <div class="text1">Upload logo:</div>
                        <div class="text2">
                               <input name="logoLink" id="abc" type="file" onchange="uploadImage(this);" class="browse"><br><br><img src="/images/create-event-img1.png" alt="">
                        </div>
                    </div>
                    <div class="form_text">
                        <div class="text1">* Category:</div>
                        <div class="text2"><select name="category">
                                <option>Theater &amp; Art</option>
                            </select></div>
                    </div>
                    <div class="form_text">
                        <div class="text1">Subcategory:<br><span>(when relevant):</span></div>
                        <div class="text2"><select name="subCategory">
                                <option>Theater &amp; Art</option>
                            </select></div>
                    </div>
                </div>
                <div class="edit_form_content nospace">
                    <div class="form_text">
                        * Name of place: <br>
                        <input type="hidden" name="placeHasID" value="0">
                        <span id="nameOfPlaceCont" style="position: relative; display: inline-block;">
                            <input id="nameOfPlace" name="nameOfPlace" type="text" class="size1" onkeyup="nameOfPlaceAjax(this,event);" onfocus="nameOfPlaceAjax(this,event);">
                            <img src="/images/create-event-ico1.png" alt="">
                            <div id="list" style="position: absolute; top: 25px; left: 0px; background: white; width: 100%;"></div>
                        </span>
                    </div>
                    <div class="form_text">
                        <div class="text3">* Start date:<br><input id="startDate" name="startDate" type="text" value="00/00/0000" class="size3"><img src="/images/create-event-ico2.png" alt="" onclick="$('#startDate').focus();">
                        </div>
                        <div class="text3">* End date:<br><input id="endDate" name="endDate" type="text" value="00/00/0000" class="size3">
                            <img src="/images/create-event-ico2.png" alt="" onclick="$('#endDate').focus();"></div>
                    </div>
                    <div class="form_text">* Address:<br><input id="address" name="address" type="text" class="size1">
                    </div>
                    <div class="form_text">
                        <div class="text1">* Zip code:<br><input name="zip" type="text" class="size2"></div>
                        <div class="text4">* City:<br><input name="city" type="text" class="size4"></div>
                        <div class="text4">* Country:<br><input name="country" type="text" class="size4"></div>
                    </div>
                    <div class="form_text">
                        <div class="text5">* Entry time:</div>

                        <div class="text6 input-append bootstrap-timepicker">
                            <input id="entryTime" name="entryTime" type="text" class="size2">
                            <span class="add-on"><i class="icon-time"></i></span>
                        </div>

                        <div class="text5" style="clear:both;">End time:</div>

                        <div class="text6 input-append bootstrap-timepicker">
                            <input id="endTime" name="endTime" type="text" class="size2">
                            <span class="add-on"><i class="icon-time"></i></span>
                        </div>

                        <div class="text5" style="clear:both;">Time zone:</div>

                        <select name="DropDownTimezone" id="DropDownTimezone" style="float: right; margin: 0 26px 0 0px;">
                            <option value="-12.0">(GMT -12:00) Eniwetok, Kwajalein</option>
                            <option value="-11.0">(GMT -11:00) Midway Island, Samoa</option>
                            <option value="-10.0">(GMT -10:00) Hawaii</option>
                            <option value="-9.0">(GMT -9:00) Alaska</option>
                            <option value="-8.0">(GMT -8:00) Pacific Time (US &amp; Canada)</option>
                            <option value="-7.0">(GMT -7:00) Mountain Time (US &amp; Canada)</option>
                            <option value="-6.0">(GMT -6:00) Central Time (US &amp; Canada), Mexico City</option>
                            <option value="-5.0">(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima</option>
                            <option value="-4.0">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
                            <option value="-3.5">(GMT -3:30) Newfoundland</option>
                            <option value="-3.0">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
                            <option value="-2.0">(GMT -2:00) Mid-Atlantic</option>
                            <option value="-1.0">(GMT -1:00 hour) Azores, Cape Verde Islands</option>
                            <option value="0.0">(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
                            <option value="1.0">(GMT +1:00 hour) Brussels, Copenhagen, Madrid, Paris</option>
                            <option value="2.0">(GMT +2:00) Kaliningrad, South Africa</option>
                            <option value="3.0">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
                            <option value="3.5">(GMT +3:30) Tehran</option>
                            <option value="4.0">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
                            <option value="4.5">(GMT +4:30) Kabul</option>
                            <option value="5.0">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
                            <option value="5.5">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
                            <option value="5.75">(GMT +5:45) Kathmandu</option>
                            <option value="6.0">(GMT +6:00) Almaty, Dhaka, Colombo</option>
                            <option value="7.0">(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
                            <option value="8.0">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
                            <option value="9.0">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
                            <option value="9.5">(GMT +9:30) Adelaide, Darwin</option>
                            <option value="10.0">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
                            <option value="11.0">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
                            <option value="12.0">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
                        </select>

                    </div>
                    <div class="form_text">
                        <div class="text2">* Minimum amount of crowed needed<br>for the event to happen</div>
                        <div class="text1"><input name="minCrowd" type="text" class="size5"></div>
                    </div>
                    <div class="form_text">
                        <div class="text2">* Minimum amount of money for<br>making event</div>
                        <div class="text1"><input name="minMoney" type="text" class="size5"></div>
                    </div>
                    <div class="form_text">
                        <div class="text3">* Last campaign date:</div>
                        <div class="text3">
                            <input id="lastCampainDate" name="lastCampainDate" type="text" value="00/00/0000" class="size3"><img src="/images/create-event-ico2.png" alt="" onclick="$('#lastCampainDate').focus();">
                        </div>
                    </div>
                    <div class="form_text">
                        <div class="text2">* Maximum amount of crowd:</div>
                        <div class="text1"><input name="maxCrowd" type="text" class="size5"></div>
                    </div>
                    <div class="btn_holder"><input name="" type="submit" value="Save" class="saveEvent"></div>
                </div>
            </div>
        </div>
        <div id="country2" style="display: none;"><strong>Dashboard Content goes here.... </strong></div>
        <div id="country3" style="display: none;"><strong>Manage Content goes here....</strong></div>
    </div>
</div>
<script type="text/javascript">
    var countries = new ddtabcontent("countrytabs")
    countries.setpersist(true)
    countries.setselectedClassTarget("link") //"link" or "linkparent"
    countries.init()
</script>