<?php


use Modules\Setting\Entities\WorkerLevel;
use Modules\Worker\Entities\Worker;

function convertCurrency($anyAmount, $toCurrency)
{

    $toCurrency = \Modules\Currency\Entities\Currency::withoutTrashed()->where([
        ['en_name', $toCurrency],
    ])->first();
    if (isset($toCurrency) and $toCurrency != null) {
        return $anyAmount * $toCurrency->rate;
    } else {
        return $anyAmount * 1;
    }


}


function CheckAcceptedProofCountAndUpdateLevel($worker_id)
{
    $worker = Worker::withoutTrashed()->findOrFail($worker_id);
    $count_of_worker_accepted_proofs = $worker->proofs()->where([
        ['isEmployerAcceptProof', 'Yes'],
        ['isAdminAcceptProof', 'Yes'],
    ])->count();
    $levels = WorkerLevel::withoutTrashed()->select('id', 'minimum_approved_proof')->get();
    $level1 = $levels->where('id', 1)->firstOrFail();
    $level2 = $levels->where('id', 2)->firstOrFail();
    $level3 = $levels->where('id', 3)->firstOrFail();
    $level4 = $levels->where('id', 4)->firstOrFail();
    if ($level1->minimum_approved_proof <= $count_of_worker_accepted_proofs and $count_of_worker_accepted_proofs < $level2->minimum_approved_proof) {
//        dd($level1->minimum_approved_proof . ' <= ' . $count_of_worker_accepted_proofs . ' < ' . $level2->minimum_approved_proof, 'level 1');
        $worker->update([
            'worker_level_id' => $level1->id,
        ]);
    } elseif ($level2->minimum_approved_proof <= $count_of_worker_accepted_proofs and $count_of_worker_accepted_proofs < $level3->minimum_approved_proof) {
//        dd($level2->minimum_approved_proof . ' <= ' . $count_of_worker_accepted_proofs . ' < ' . $level3->minimum_approved_proof, 'level 2');
        $worker->update([
            'worker_level_id' => $level2->id,
        ]);
    } elseif ($level3->minimum_approved_proof <= $count_of_worker_accepted_proofs and $count_of_worker_accepted_proofs < $level4->minimum_approved_proof) {
//        dd($level3->minimum_approved_proof . ' <= ' . $count_of_worker_accepted_proofs . ' < ' . $level4->minimum_approved_proof, 'level 3');
        $worker->update([
            'worker_level_id' => $level3->id,
        ]);
    } elseif ($level4->minimum_approved_proof <= $count_of_worker_accepted_proofs) {
//        dd($level4->minimum_approved_proof . ' <= ' . $count_of_worker_accepted_proofs, 'level 4');
        $worker->update([
            'worker_level_id' => $level4->id,
        ]);
    }


}
