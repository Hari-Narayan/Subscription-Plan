<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Plan;
use App\Models\Package;

class SubscriptionController extends Controller
{
    public function index()
    {
        $plans = Plan::get()->toArray();
        $packages = Package::get()->toArray();

        return view('plan-list', compact('plans', 'packages'));
    }

    public function getSubscription(Request $request)
    {
        $subscriptions = $request->subscription;
        $error = false;
        $subscribed = [];
        $msg = '';
        $i = 0;

        foreach ($subscriptions as $key => $value) {
            $plan_type = $price = '';
            $plan = Plan::find($key);

            if (isset($value['plan'])) {
                $plan_type = $value['type'];
                $price = $value['plan'];

                if (isset($value['package'])) {
                    $package_ids = $value['package'];

                    if (count($package_ids) < $plan->min_package) {
                        $error = true;
                        $msg = "Please select $plan->min_package packages for $plan->title plan!";
                        break;
                    } else {
                        $packages = Package::select('title')->whereIn('id', $package_ids)->get()->toArray();

                        $subscribed[$i] = [
                            'name' => $plan->title,
                            'type' => $plan_type,
                            'price' => $price,
                            'packages' => $packages,
                        ];
                        $i++;
                    }
                } else {
                    $error = true;
                    $msg = "Please select atleast one plan for $plan->title!";
                    break;
                }
            } else {
                $error = true;
                $msg = 'Please select plan type before packages selection!';
                break;
            }
        }

        if ($error) {
            return response()->json([
                'success' => false,
                'msg' => $msg,
                'html' => '',
            ]);
        }

        return response()->json([
            'success' => true,
            'msg' => 'Plan subscribed successfully',
            'html' => view('subscribed-plans', compact('subscribed'))->render(),
        ]);
    }
}
