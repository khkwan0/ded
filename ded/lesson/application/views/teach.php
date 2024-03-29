<style>
    html {
    background: url(/lesson/assets/img/lesson/<?php echo $background?>) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size:cover;
    font-family: arial;
    }
</style>
<div id="less_ctr_outer">
    <div id="lesson_ctr">
        <div>
            <?php if (isset($prev_id) && $prev_id):?>
                <span class="prev"><a href="/lesson/teach/unit/<?php echo $prev_id?>">Back</a></span>
            <?php endif;?>
            <?php if ($at_end):?>
                <span class="next"><a href="/lesson/test/quiz/69">Take the final</a></span>
            <?php else:?>
                <span class="next"><a href="/lesson/teach/unit/<?php echo $issues[1]->id?>">Next</a></span>
            <?php endif;?>
        </div>
        <h2>Welcome <?php echo $email?></h2>
        <div>
            <table>
                <tr><td>Unit</td><td><?php echo $issues[0]->unit?>/10</td></tr>
                <tr><td>Section</td><td><?php echo $issues[0]->issue?></td></tr>
                <tr><td>Issue</td><td><?php echo $issues[0]->section?></td></tr>
                <tr><td>Slide</td><td><?php echo $issues[0]->slide?></td></tr>
            </table>
        </div>
        <div id="issue_area">
            <?php echo $issues[0]->lesson?>
        </div>
        <div>
            <?php if (isset($prev_id) && $prev_id):?>
                <div id="next"><a href="/lesson/teach/unit/<?php echo $prev_id?>">Back</a></div>
            <?php endif;?>
            <?php if ($at_end):?>
                <div id="next"><a href="/lesson/test/quiz/69">Take the final</a></div>
            <?php else:?>
                <div id="next"><a href="/lesson/teach/unit/<?php echo $issues[1]->id?>">Next</a></div>
            <?php endif;?>
        </div>
    </div>
</div>
