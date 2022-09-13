<div class="input-group">
                    <label for="check-in" class="input-label">Check in</label>
                    <input type="date" class="input" id="checkin" name="check_in" min="8-16-2022" required>
                </div>
<script>
   $(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
   
    $('#txtDate').attr('min', maxDate);
});
                </script>