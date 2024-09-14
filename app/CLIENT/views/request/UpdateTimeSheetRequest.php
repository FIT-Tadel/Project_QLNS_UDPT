<form action="index.php?action=update-time-sheet" method="POST" id="update-timesheet-request">
    <div class="time-sheet-content">
        <h2 class="time-sheet-title">Update Time Sheet</h2>

        <!-- Work Date -->
        <label for="work-date" class="time-sheet-label">Select Date</label>
        <div class="input-field">
            <input type="date" name="work-date" id="work-date" required 
                   oninvalid="this.setCustomValidity('Please enter a valid work date')" 
                   oninput="this.setCustomValidity('')"/>
        </div>

        <label for=""></label><div></div>

        <!-- Time In -->
        <label for="time-in" class="time-sheet-label">Time In</label>
        <div class="input-field">
            <input type="time" name="time-in" id="time-in" value="08:00:00" required 
                   oninvalid="this.setCustomValidity('Please enter a valid time in')" 
                   oninput="this.setCustomValidity('')"/>
        </div>

        <!-- Time Out -->
        <label for="time-out" class="time-sheet-label">Time Out</label>
        <div class="input-field">
            <input type="time" name="time-out" id="time-out" value="17:00:00" required 
                   oninvalid="this.setCustomValidity('Please enter a valid time out')" 
                   oninput="this.setCustomValidity('')"/>
        </div>

        <!-- Break Start Time -->
        <label for="break-start-time" class="time-sheet-label">Break Start Time</label>
        <div class="input-field">
            <input type="time" name="break-start-time" value="12:00:00" id="break-start-time" 
                   oninput="this.setCustomValidity('')"/>
        </div>

        <!-- Break End Time -->
        <label for="break-end-time" class="time-sheet-label">Break End Time</label>
        <div class="input-field">
            <input type="time" name="break-end-time" value="13:30:00" id="break-end-time" 
                   oninput="this.setCustomValidity('')"/>
        </div>

        <!-- Overtime Hours -->
        <label for="overtime-hours" class="time-sheet-label">Overtime Hours</label>
        <div class="input-field">
            <i class="fas fa-hourglass-half"></i>
            <input type="number" name="overtime-hours" id="overtime-hours" value="0" min="0" 
                   placeholder="Enter overtime hours" oninput="this.setCustomValidity('')"/>
        </div>

        <!-- Updatesheet Reason -->
        <label for="update-reason" class="time-sheet-label">Update Reason</label>
        <textarea name="update-sheet-reason" id="update-reason" class="update-sheet-reason"></textarea>

        <!-- Submit Button -->
        <input type="submit" name="update-time-sheet" value="Update Time Sheet" class="btn solid timesheet-request-btn" />
    </div>
</form>
