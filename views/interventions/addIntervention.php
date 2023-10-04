<div class="displayForm">
    <form class="addIntervention" id="profileForm" method="POST">
        <h1>Ajout d'une intervention</h1>
        <h2>Date de la création</h2>
        <input type="hidden" id="date" name="date" placeholder="date" value="" class="">
        <div class="displaySelect">
            <div>
                <p>Lieu de l'intervention:</p>
                <select>
                    <option selected disabled value="option1">entreprise</option>
                    <option value="option2"></option>
                    <option value="option3"></option>
                    <option value="option4"></option>
                    <option value="option5"></option>
                    <option value="option6"></option>
                    <option value="option7"></option>
                    <option value="option8"></option>
                    <option value="option9"></option>
                    <option value="option10"></option>
                    <option value="option11"></option>
                </select>
            </div>
            <div>
                <p>Type d'intervention:</p>
                <select>
                    <option selected disabled value="option1">motif</option>
                    <option value="option2"></option>
                    <option value="option3"></option>
                    <option value="option4"></option>
                    <option value="option5"></option>
                    <option value="option6"></option>
                    <option value="option7"></option>
                    <option value="option8"></option>
                    <option value="option9"></option>
                    <option value="option10"></option>
                    <option value="option11"></option>
                </select>
            </div>
        </div>
        <p>Description de l'intervention:</p>
        <textarea rows="8"></textarea>
        <div>
            <!--href inutile servant juste au test-->
            <a href="./Liste-Intervention"><button name="addIntervention" id="addIntervention" type="submit">Rajouter une intervention</a></button>
        </div>
    </form>
</div>
<script src="assets/js/addIntervention.js"></script>