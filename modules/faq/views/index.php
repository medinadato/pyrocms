<h3 class="faq-heading"><?php echo lang('faq_page_title'); ?></h3>
<?php if(!empty($questions)): ?>
    <ul id="faq">
        <?php foreach($questions as $faq): ?>
        <li class="question">
        <span><?php echo lang('faq_question_label'); ?>: </span>
        <?php echo $faq->question; ?>
        </li>
        <li class="answer"><?php echo $faq->answer; ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p class="no-questions"><?php echo lang('faq_no_questions'); ?></p>
<?php endif; ?>
