<div style="display:block; width:100%;">
    <div class="wpgmaps_directions_outer_div" id="wpgmaps_directions_edit" style="width: 100%; clear: both;">
        <div id="wpgmaps_directions_editbox">
            <table>
                <tbody>
                    <tr>
                        <td><label for="wpgmza_dir_type">For</label></td>
                        <td>
                            <select id="wpgmza_dir_type" name="wpgmza_dir_type">
                                <option selected="selected" value="DRIVING">
                                    Driving
                                </option>
                                <option value="WALKING">
                                    Walking
                                </option>
                                <option value="TRANSIT">
                                    Transit
                                </option>
                                <option value="BICYCLING">
                                    Bicycling
                                </option>
                            </select> &nbsp; <a href="javascript:void(0);" id="wpgmza_show_options" style="font-size:10px;">show options</a> <a href="javascript:void(0);" id="wpgmza_hide_options" style="font-size:10px; display:none;">hide options</a>
                            <div id="wpgmza_options_box" style="display:none">
                                <input id="wpgmza_tolls" name="wpgmza_tolls" type="checkbox" value="tolls"> <label for="wpgmza_tolls">Avoid Tolls</label><br>
                                <input id="wpgmza_highways" name="wpgmza_highways" type="checkbox" value="highways"> <label for="wpgmza_highways">Avoid Highways</label><br>
                                <input id="wpgmza_ferries" name="wpgmza_ferries" type="checkbox" value="ferries"> <label for="wpgmza_ferries">Avoid Ferries</label>
                            </div>
                        </td>
                    </tr>
                    <tr class="wpgmaps_from_row">
                        <td class="wpgmaps_from_td1"><label for="wpgmza_input_from">From</label></td>
                        <td class="wpgmaps_from_td2" width="90%"><input autocomplete="off" id="wpgmza_input_from" placeholder="Enter a location" style="width:80%" type="text" value=""></td>
                    </tr>
                    <tr class="wpgmaps_to_row">
                        <td class="wpgmaps_to_td1"><label for="wpgmza_input_to">To</label></td>
                        <td class="wpgmaps_to_td2" width="90%"><input autocomplete="off" id="wpgmza_input_to" placeholder="Enter a location" style="width:80%" type="text" value=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input class="wpgmaps_get_directions" onclick="javascript:void(0);" type="button" value="Go"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div id="wpgmaps_directions_notification" style="display:none;">
        Fetching directions......
    </div>
    <div id="wpgmaps_directions_reset" style="display:none;">
        <a href="javascript:void(0)" id="wpgmaps_reset_directions" onclick="wpgmza_reset_directions();" title="Reset directions">Reset directions</a><br>
        <a href="" id="wpgmaps_print_directions" title="Print directions">Print directions</a>
    </div>
    <div id="directions_panel"></div>
</div>