<form action="index.php?action=home" method="POST" id="wfh-request">
    <div class="wfh-request-content">
        <h2 for="" class="wfh-request-title">Work From Home Request</h2>

        <label for="" class="wfh-request-label">Select WFH-Date</label>
        <div class="input-field">
            <i class="fas fa-calendar-alt"></i>
            <input type="date" name="selected-date" required
                                        oninvalid="this.setCustomValidity('Please enter a valid date')" 
                                        oninput="this.setCustomValidity('')"/>
        </div>

        <label for="" class="wfh-request-label">Reason</label>
        <textarea name="reason" class="wfh-reason" required></textarea>


        <input type="submit" name="wfh-request" value="Send Request" class="btn solid wfh-request-btn" />
    </div>
</form>