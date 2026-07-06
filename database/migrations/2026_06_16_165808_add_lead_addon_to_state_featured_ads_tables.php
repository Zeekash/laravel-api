<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('state_featured_slots')) {
            Schema::table('state_featured_slots', function (Blueprint $table) {
                if (! Schema::hasColumn('state_featured_slots', 'lead_addon_enabled')) {
                    $table->boolean('lead_addon_enabled')->default(true);
                }

                if (! Schema::hasColumn('state_featured_slots', 'lead_addon_leads_count')) {
                    $table->unsignedSmallInteger('lead_addon_leads_count')->default(5);
                }

                if (! Schema::hasColumn('state_featured_slots', 'lead_addon_price_cents')) {
                    $table->unsignedInteger('lead_addon_price_cents')->default(10000);
                }

                if (! Schema::hasColumn('state_featured_slots', 'lead_addon_note')) {
                    $table->text('lead_addon_note')->nullable();
                }
            });
        }

        if (Schema::hasTable('state_featured_subscriptions')) {
            Schema::table('state_featured_subscriptions', function (Blueprint $table) {
                if (! Schema::hasColumn('state_featured_subscriptions', 'lead_addon_selected')) {
                    $table->boolean('lead_addon_selected')->default(false);
                }

                if (! Schema::hasColumn('state_featured_subscriptions', 'lead_addon_leads_count')) {
                    $table->unsignedSmallInteger('lead_addon_leads_count')->default(0);
                }

                if (! Schema::hasColumn('state_featured_subscriptions', 'lead_addon_price_cents')) {
                    $table->unsignedInteger('lead_addon_price_cents')->default(0);
                }

                if (! Schema::hasColumn('state_featured_subscriptions', 'total_price_cents')) {
                    $table->unsignedInteger('total_price_cents')->default(0);
                }

                if (! Schema::hasColumn('state_featured_subscriptions', 'stripe_lead_addon_product_id')) {
                    $table->string('stripe_lead_addon_product_id')->nullable();
                }

                if (! Schema::hasColumn('state_featured_subscriptions', 'stripe_lead_addon_price_id')) {
                    $table->string('stripe_lead_addon_price_id')->nullable();
                }
            });
        }

        if (Schema::hasTable('state_featured_subscriptions')) {
            DB::table('state_featured_subscriptions')
                ->where(function ($query) {
                    $query->whereNull('total_price_cents')->orWhere('total_price_cents', 0);
                })
                ->update([
                    'total_price_cents' => DB::raw('COALESCE(price_cents, 0) + COALESCE(lead_addon_price_cents, 0)'),
                ]);
        }

        if (Schema::hasTable('state_featured_subscription_invoices')) {
            Schema::table('state_featured_subscription_invoices', function (Blueprint $table) {
                if (! Schema::hasColumn('state_featured_subscription_invoices', 'slot_price_cents')) {
                    $table->unsignedInteger('slot_price_cents')->default(0);
                }

                if (! Schema::hasColumn('state_featured_subscription_invoices', 'lead_addon_price_cents')) {
                    $table->unsignedInteger('lead_addon_price_cents')->default(0);
                }

                if (! Schema::hasColumn('state_featured_subscription_invoices', 'lead_addon_leads_count')) {
                    $table->unsignedSmallInteger('lead_addon_leads_count')->default(0);
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('state_featured_subscriptions')) {
            DB::table('state_featured_subscriptions')
                ->where(function ($query) {
                    $query->whereNull('total_price_cents')->orWhere('total_price_cents', 0);
                })
                ->update([
                    'total_price_cents' => DB::raw('COALESCE(price_cents, 0) + COALESCE(lead_addon_price_cents, 0)'),
                ]);
        }

        if (Schema::hasTable('state_featured_subscription_invoices')) {
            Schema::table('state_featured_subscription_invoices', function (Blueprint $table) {
                foreach (['slot_price_cents', 'lead_addon_price_cents', 'lead_addon_leads_count'] as $column) {
                    if (Schema::hasColumn('state_featured_subscription_invoices', $column)) {
                        $table->dropColumn($column);
                    }
                }
            });
        }

        if (Schema::hasTable('state_featured_subscriptions')) {
            Schema::table('state_featured_subscriptions', function (Blueprint $table) {
                foreach ([
                    'lead_addon_selected',
                    'lead_addon_leads_count',
                    'lead_addon_price_cents',
                    'total_price_cents',
                    'stripe_lead_addon_product_id',
                    'stripe_lead_addon_price_id',
                ] as $column) {
                    if (Schema::hasColumn('state_featured_subscriptions', $column)) {
                        $table->dropColumn($column);
                    }
                }
            });
        }

        if (Schema::hasTable('state_featured_slots')) {
            Schema::table('state_featured_slots', function (Blueprint $table) {
                foreach (['lead_addon_enabled', 'lead_addon_leads_count', 'lead_addon_price_cents', 'lead_addon_note'] as $column) {
                    if (Schema::hasColumn('state_featured_slots', $column)) {
                        $table->dropColumn($column);
                    }
                }
            });
        }
    }
};
