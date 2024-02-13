<?php

namespace Modules\Task\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Task\Entities\TaskWorkFlow;

class TaskWorkFlowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task_workflows = [
            [
                'task_id' => 1,
                'work_flow' => 'this first work flow',

            ],
            [
                'task_id' => 1,
                'work_flow' => 'this second work flow',

            ],
            [
                'task_id' => 2,
                'work_flow' => 'm ipsum dolor sit amet, no dicant partem verear eum, utinam doming ex eum. Ad ius ceteros fierent luptatum, est idque propriae appellantur at. Id mazi',

            ],
            [
                'task_id' => 2,
                'work_flow' => ' postulant. Ut rebum meliore ius. Mea munere delicata repudiandae no, in facete iisque invenire sed.',

            ],


            [
                'task_id' => 3,
                'work_flow' => ', elit aeque omnes mea te, at vix periculis pers',

            ],
            [
                'task_id' => 3,
                'work_flow' => 'amet, no dicant partem verear eum, utinam doming ex eum. Ad ius ceteros fierent luptatum, est idque propriae appellantur at. Id ma',

            ],
            [
                'task_id' => 3,
                'work_flow' => ' sed, te pri saepe prompta. Esse ',

            ],

            [
                'task_id' => 4,
                'work_flow' => 'r eum, utinam doming',

            ],
            [
                'task_id' => 4,
                'work_flow' => 'ix periculis persequeris consequuntur.No decore fabulas temporibus sed, te pri saepe prompta. Esse sadipscing consequuntur usu at, ubique dissentiunt ei eam. At sea illum laudem accus',

            ],
            [
                'task_id' => 4,
                'work_flow' => 'olum graeco eu cum. Cu ',

            ],

            [
                'task_id' => 5,
                'work_flow' => 'ent nonsensical; its not genuine, correct, or comprehensible Latin anymore. While lorem ipsums still resembles classical Latin, it actually has no meaning whatsoever. As Ciceros text do',

            ],
            [
                'task_id' => 5,
                'work_flow' => 'layout, and printing in place of English to emphasise design elements over content. Its also called placeholder (or filler) text. Its a convenient tool for mock-ups. It helps to outline the visual elements of a docum',

            ],
            [
                'task_id' => 5,
                'work_flow' => 'explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut ',

            ],

            [
                'task_id' => 6,
                'work_flow' => ' explain to you how all this mistaken ide',

            ],
            [
                'task_id' => 6,
                'work_flow' => 's, dislikes, or avoids',

            ],
            [
                'task_id' => 6,
                'work_flow' => 'The Latin scholar H. Rackham translated the above in 1914:',

            ],
            [
                'task_id' => 7,
                'work_flow' => 'simple and easy to distinguish. In a free h',

            ],
            [
                'task_id' => 7,
                'work_flow' => 'm most common today. L',

            ],
            [
                'task_id' => 7,
                'work_flow' => 'n in lettering catalogs by ',

            ],
            [
                'task_id' => 8,
                'work_flow' => 'us PageMaker for Apple Macintosh com',

            ],
            [
                'task_id' => 8,
                'work_flow' => 'every pain avoided. But in certain circumstances a',

            ],
            [
                'task_id' => 8,
                'work_flow' => 'hich is intended to a',

            ],
            [
                'task_id' => 9,
                'work_flow' => ' on your face to impress the new boss is y',

            ],
            [
                'task_id' => 9,
                'work_flow' => 'Consider this: You made all the required mock ups for commissioned layout, got all the approvals, built a tested code base or had them built, you decided on a content mana',

            ],
            [
                'task_id' => 9,
                'work_flow' => 'not so bad, theres dummy copy to the rescue. But',

            ],
            [
                'task_id' => 10,
                'work_flow' => 'y required. Its content strategy gone awry right from the s',

            ],
            [
                'task_id' => 10,
                'work_flow' => 'unning it out of town in shame.',

            ],


        ];
        foreach ($task_workflows as $task_workflow) {
            TaskWorkFlow::create($task_workflow);
        }
    }
}
