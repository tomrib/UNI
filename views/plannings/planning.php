
<div class="displayTable">
    <h1>Planning de la semaine</h1>
    <div class="tableContainer">
        <table class="responsiveTable planningTable">
            <thead>
                <tr>
                    <?php foreach ($weekDays as $day): ?>
                    <th class="<?= $day['today'] ? 'today' : '' ?>">
                        <?= $day['name'] . '<br>' . $day['frenchDate'] ?>
                    </th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody class="liveList">
                <tr>

                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
var_dump($_SESSION['user']);