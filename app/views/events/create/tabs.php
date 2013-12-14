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
                    <div class="form_text">* Name of event up to 70 characters:<br><input name="name" type="text" class="size1" name="name"> <a href="#"><img src="/images/create-event-ico1.png" alt=""></a></div>
                    <div class="form_text">* Short description of event up to 140 characters:<br><textarea name="description" cols="37" rows="4"></textarea></div>
                    <div class="form_text">
                        <div class="text1">Upload logo:</div>
                        <div class="text2"><input name="" type="text" size="13"><input name="logoLink" type="button" class="browse"><br><br><img src="/images/create-event-img1.png" alt=""></div>
                    </div>
                    <div class="form_text">
                        <div class="text1">* Category:</div>
                        <div class="text2"><select name="category"><option>Theater &amp; Art</option></select></div>
                    </div>
                    <div class="form_text">
                        <div class="text1">Subcategory:<br><span>(when relevant):</span></div>
                        <div class="text2"><select name="subCategory"><option>Theater &amp; Art</option></select></div>
                    </div>
                </div>
                <div class="edit_form_content nospace">
                    <div class="form_text">* Name of place:<br><hidden name="placeHasID" value="0"> <input name="nameOfPlace" type="text" class="size1"> <a href="#"><img src="/images/create-event-ico1.png" alt=""></a></div>
                    <div class="form_text">
                        <div class="text3">* Start date:<br><input name="startDate" type="text" value="00/00/0000" class="size3"> <a href="#"><img src="/images/create-event-ico2.png" alt=""></a></div>
                        <div class="text3">* End date:<br><input name="endDate" type="text" value="00/00/0000" class="size3"> <a href="#"><img src="/images/create-event-ico2.png" alt=""></a></div>
                    </div>
                    <div class="form_text">* Address:<br><input name="address" type="text" class="size1"></div>
                    <div class="form_text">
                        <div class="text1">* Zip code:<br><input name="zip" type="text" class="size2"></div>
                        <div class="text4">* City:<br><input name="city" type="text" class="size4"></div>
                        <div class="text4">* Country:<br><input name="country" type="text" class="size4"></div>
                    </div>
                    <div class="form_text">
                        <div class="text5">* Entry time:</div>
                        <div class="text6"><input name="entryTime" type="text" class="size2"></div>
                        <div class="text5">End time:</div>
                        <div class="text6"><input name="endTime" type="text" class="size2"></div>
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
                        <div class="text3"><input name="lastCampainDate" type="text" value="00/00/0000" class="size3"> <a href="#"><img src="/images/create-event-ico2.png" alt=""></a></div>
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
    var countries=new ddtabcontent("countrytabs")
    countries.setpersist(true)
    countries.setselectedClassTarget("link") //"link" or "linkparent"
    countries.init()
</script>