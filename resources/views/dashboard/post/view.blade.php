@extends('base.dashboard')
@section('extra-css')
    <style>
        .drag-handle {
            cursor: move;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col s12">
            <ul id="sections" class="collapsible expandable">
                <?php foreach($data->post->sections as $i => $section):?>
                <li data-id="<?= $section->id ?>">
                    <div class="collapsible-header">
                        <i class="material-icons left drag-handle">drag_indicator</i>
                        Section
                        <?= $i + 1 ?>
                        [<?= $section->sectionable_type ?>]
                    </div>
                    <?php if($section->sectionable_type == 'paragraph'):?>
                    <div class="collapsible-body"><span><?= $section->sectionable->content ?></span></div>

                    <?php elseif($section->sectionable_type == 'image'):?>
                    <div class="collapsible-body">
                        <img src="<?= $section->sectionable->path ?>" alt="<?= $section->sectionable->title ?>"
                            class="responsive-img" />
                    </div>

                    <?php elseif($section->sectionable_type == 'embed'):?>
                    <div class="collapsible-body">
                        <div class="video-container">
                            <?= $section->sectionable->content ?>
                        </div>
                    </div>

                    <?php endif;?>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
@endsection
@section('extra-js')
    <!-- jsDelivr :: Sortable :: Latest (https://www.jsdelivr.com/package/npm/sortablejs) -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>

        var elem = document.querySelector('.collapsible.expandable');
        var instance = M.Collapsible.init(elem, {
            accordion: false
        });

        let sectionContainer = document.getElementById('sections');
        let sortable = new Sortable(sectionContainer, {
            handle: ".drag-handle",
            animation: 150,
            ghostClass: 'blue-background-class',
            onUpdate: function(evt) {
                console.log(evt);
                console.log(this.toArray());
            }
        });
    </script>
@endsection
