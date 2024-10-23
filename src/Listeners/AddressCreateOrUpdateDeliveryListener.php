<?php

namespace RiseTech\Address\Listeners;

use RiseTech\Address\Events\Address\AddressCreateOrUpdateDeliveryEvent;
use RiseTech\Address\Model\Address as AddressModel;

class AddressCreateOrUpdateDeliveryListener
{
    public function __construct()
    {
    }

    public function handle(AddressCreateOrUpdateDeliveryEvent $event): void
    {

        try {
            $created = !is_null($event->model->address);
            $chargeAddresses = $event->request->input('address_delivery', []);

            if(!is_null($event->model->getOriginal('deleted_at'))){
                return;
            }
            

            if ($created) {
                $event->model->addressDelivery()->delete();
            }

            foreach ($chargeAddresses as $address) {
                $address = \RiseTech\Address\Address::fillWithDefault($address, $event->model);

                $address['address_type'] = get_class($event->model);
                $address['address_id'] = $event->model->getKey();
                $address['type'] = 'delivery';
                AddressModel::create($address);
            }


        } catch (\Exception $exception) {
        }
    }
}
