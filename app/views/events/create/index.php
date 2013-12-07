<?= $path; ?>
    <div class="details_holder">
        <div class="page_title">Creating good time</div>
        <form id="createEvent" action="/event" method="POST" onsubmit="return false;">
            <div class="create_event_details_main">

                <?= $tabs; ?>
                <?= $eventInfo; ?>
                <?= $eventDistribution; ?>
                <?= $ga; ?>
                <?= $bottomButtons; ?>

            </div>
            <?= $tickets; ?>
        </form>
    </div>
<?= $scripts; ?>