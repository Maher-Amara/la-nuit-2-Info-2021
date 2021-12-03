<style type="text/css">
    .timeline .timeline-item {display: flex;align-items: flex-start;}
    .timeline .timeline-item .timeline-item-marker {display: inline-flex;flex-direction: column;align-items: center;justify-content: center;margin-bottom: 2rem;}
    .timeline .timeline-item .timeline-item-marker .timeline-item-marker-text {font-size: 0.875rem;width: 6rem;color: #a7aeb8;text-align: center;margin-bottom: 0.5rem;display: block;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;}
    .timeline .timeline-item .timeline-item-marker .timeline-item-marker-indicator {display: inline-flex;align-items: center;justify-content: center;height: 3rem;width: 3rem;background-color: #f2f6fc;border-radius: 100%;}
    .timeline .timeline-item .timeline-item-content {padding-top: 0;padding-bottom: 2rem;padding-left: 1rem;width: 100%;}
    .timeline .timeline-item:last-child .timeline-item-content {padding-bottom: 0 !important;}
    @media (min-width: 576px) {
    .timeline .timeline-item .timeline-item-marker {flex-direction: row;transform: translateX(1.625rem);margin-bottom: 0;}
    .timeline .timeline-item .timeline-item-marker .timeline-item-marker-text {margin-right: 0.5rem;margin-bottom: 0;}
    .timeline .timeline-item .timeline-item-content {padding-top: 0.75rem;padding-bottom: 3rem;padding-left: 3rem;border-left: solid 0.25rem #f2f6fc;}
    .timeline .timeline-item:last-child .timeline-item-content {border-left-color: transparent;}
    }
    .timeline.timeline-sm .timeline-item .timeline-item-marker {transform: translateX(0.875rem);}
    .timeline.timeline-sm .timeline-item .timeline-item-marker .timeline-item-marker-text {width: 3rem;font-size: 0.7rem;}
    .timeline.timeline-sm .timeline-item .timeline-item-marker .timeline-item-marker-indicator {height: 1.5rem;width: 1.5rem;font-size: 0.875rem;}
    .timeline.timeline-sm .timeline-item .timeline-item-marker .timeline-item-marker-indicator .feather {height: 0.75rem;width: 0.75rem;}
    .timeline.timeline-sm .timeline-item .timeline-item-content {font-size: 0.875rem;padding-top: 0.15rem;padding-bottom: 1rem;padding-left: 1.5rem;}
    .timeline.timeline-xs .timeline-item .timeline-item-marker {transform: translateX(0.5625rem);}
    .timeline.timeline-xs .timeline-item .timeline-item-marker .timeline-item-marker-text {width: 3rem;font-size: 0.7rem;}
    .timeline.timeline-xs .timeline-item .timeline-item-marker .timeline-item-marker-indicator {height: 0.875rem;width: 0.875rem;font-size: 0.875rem;border: 0.125rem solid #fff;margin-top: -0.125rem;}
    .timeline.timeline-xs .timeline-item .timeline-item-content {font-size: 0.875rem;padding-top: 0;padding-bottom: 1rem;padding-left: 1.5rem;}
</style>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header"><strong>Activity history</strong></div>
            <div class="card-body card-block">
                <div class="timeline">
                    <?php foreach($activitys as $activity){?>
                        <?php switch ($activity['type']) { 
                            case 'primary': ?>
                                <div class="timeline-item">
                                    <div class="timeline-item-marker">
                                        <div class="timeline-item-marker-text"><?= $activity['created_at'] ?></div>
                                        <div class="timeline-item-marker-indicator bg-primary-soft text-primary">
                                            <i class="ti-check"></i>
                                        </div>
                                    </div>
                                    <div class="timeline-item-content pt-0">
                                        <div class="card shadow-sm">
                                            <div class="card-body">
                                                <h3 class="text-primary"><?= $activity['title'] ?></h3>
                                                User admin <a href="<?= base_url("admin/admins")?>"><?= $activity['name'] ?></a> <?= $activity['description'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php break;
                            case 'secondary': ?>
                                <div class="timeline-item">
                                    <div class="timeline-item-marker">
                                        <div class="timeline-item-marker-text"><?= $activity['created_at'] ?></div>
                                        <div class="timeline-item-marker-indicator bg-secondary-soft text-secondary"><i class="ti-check"></i></i></div>
                                    </div>
                                    <div class="timeline-item-content pt-0">
                                        <div class="card shadow-sm">
                                            <div class="card-body">
                                                <h3 class="text-secondary"><?= $activity['title'] ?></h3>
                                                User admin <a href="<?= base_url("admin/admins")?>"><?= $activity['name'] ?></a> <?= $activity['description'] ?>                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php break;
                            case 'success': ?>
                                <div class="timeline-item">
                                    <div class="timeline-item-marker">
                                        <div class="timeline-item-marker-text"><?= $activity['created_at'] ?></div>
                                        <div class="timeline-item-marker-indicator bg-success-soft text-success"><i class="ti-check"></i></div>
                                    </div>
                                    <div class="timeline-item-content pt-0">
                                        <div class="card shadow-sm">
                                            <div class="card-body">
                                                <h3 class="text-success"><?= $activity['title'] ?></h3>
                                                User admin <a href="<?= base_url("admin/admins")?>"><?= $activity['name'] ?></a> <?= $activity['description'] ?>                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php break;
                            case 'warning': ?>
                                <div class="timeline-item">
                                    <div class="timeline-item-marker">
                                        <div class="timeline-item-marker-text"><?= $activity['created_at'] ?></div>
                                        <div class="timeline-item-marker-indicator bg-warning-soft text-warning"><i class="ti-check"></i></div>
                                    </div>
                                    <div class="timeline-item-content pt-0">
                                        <div class="card shadow-sm">
                                            <div class="card-body">
                                                <h3 class="text-warning"><?= $activity['title'] ?></h3>
                                                User admin <a href="<?= base_url("admin/admins")?>"><?= $activity['name'] ?></a> <?= $activity['description'] ?>                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php break;
                            case 'danger': ?>
                                <div class="timeline-item">
                                    <div class="timeline-item-marker">
                                        <div class="timeline-item-marker-text"><?= $activity['created_at'] ?></div>
                                        <div class="timeline-item-marker-indicator bg-danger-soft text-danger"><i class="ti-check"></i></div>
                                    </div>
                                    <div class="timeline-item-content pt-0">
                                        <div class="card shadow-sm">
                                            <div class="card-body">
                                                <h3 class="text-danger"><?= $activity['title'] ?></h3>
                                                User admin <a href="<?= base_url("admin/admins")?>"><?= $activity['name'] ?></a> <?= $activity['description'] ?>                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php break;
                        } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>