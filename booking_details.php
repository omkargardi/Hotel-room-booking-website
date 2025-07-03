<?php if (isset($_GET['message'])): ?>
    <?php if ($_GET['message'] == 'cancel_success'): ?>
        <p class="success">Your booking has been successfully cancelled.</p>
    <?php elseif ($_GET['message'] == 'cancel_error'): ?>
        <p class="error">There was an error cancelling your booking. Please try again.</p>
    <?php endif; ?>
<?php endif; ?>
