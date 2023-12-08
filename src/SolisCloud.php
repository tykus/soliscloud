<?php

namespace Tykus\SolisCloud;

use DateTime;

class SolisCloud
{
    public function __construct(private readonly Client $client)
    {
    }

    public function getUserStationsList($page = 1, $perPage = 10): array
    {
        return $this->client
            ->post(Endpoints::USER_STATIONS_LIST, ['pageNo' => $page, 'pageSize' => $perPage])
            ->json('data');

    }

    public function getStationDetail(int $stationId): array
    {
        return $this->client
            ->post(Endpoints::STATION_DETAIL, ['id' => $stationId])
            ->json('data');

    }

    // public function getStationDetailList(): array
    // {
    //     return $this->client->post(Endpoints::STATION_DETAIL_LIST, [], 'POST');
    // }

    // public function getCollectorList(): array
    // {
    //     return $this->client->post(Endpoints::COLLECTOR_LIST, [], 'POST');
    // }
    // public function getCollectorDetail(): array
    // {
    //     return $this->client->post(Endpoints::COLLECTOR_DETAIL, [], 'POST');
    // }

    // public function getInverterList(): array
    // {
    //     return $this->client->post(Endpoints::INVERTER_LIST, [], 'POST');
    // }
    // public function getInverterDetail(): array
    // {
    //     return $this->client->post(Endpoints::INVERTER_DETAIL, [], 'POST');
    // }
    // public function getInverterDetailList(): array
    // {
    //     return $this->client->post(Endpoints::INVERTER_DETAIL_LIST, [], 'POST');
    // }

    public function getStationDay(): array
//     public function getStationDay($stationId, $currency = 'EUR', $date = null, $timezone = null): array
    {
        return $this->client
            ->post(Endpoints::STATION_DAY, [
                //             'stationId' => $stationId,
                'money' => 'EUR',
                'time' => $date ?? now()->format('Y-m-d'),
                'timezone' => $timezone ??= config('app.timezone'),
            ], 'POST')
            ->json('data');
    }

    public function getStationMonth(): array
    {
        return $this->client->post(Endpoints::STATION_MONTH, [
            //             'stationId' => $stationId,
            'money' => 'EUR',
            'time' => $date ?? now()->format('Y-m'),
            'timezone' => $timezone ??= config('app.timezone'),
        ], 'POST')
            ->json('data');
    }

    // public function getStationYear(): array
    // {
    //     return $this->client->post(Endpoints::STATION_YEAR, [], 'POST');
    // }

    // public function getStationAll(): array
    // {
    //     return $this->client->post(Endpoints::STATION_ALL, [], 'POST');
    // }

    // public function getInverterDay(): array
    // {
    //     return $this->client->post(Endpoints::INVERTER_DAY, [], 'POST');
    // }

    // public function getInverterMonth(): array
    // {
    //     return $this->client->post(Endpoints::INVERTER_MONTH, [], 'POST');
    // }

    // public function getInverterYear(): array
    // {
    //     return $this->client->post(Endpoints::INVERTER_YEAR, [], 'POST');
    // }

    // public function getInverterAll(): array
    // {
    //     return $this->client->post(Endpoints::INVERTER_ALL, [], 'POST');
    // }

    // public function getAlarmList(): array
    // {
    //     return $this->client->post(Endpoints::ALARM_LIST, [], 'POST');
    // }

    public function getStationDayEnergyList(?DateTime $date = null, int $pageNo = 1, int $pageSize = 10): array
    {
        return $this->client->post(Endpoints::STATION_DAY_ENERGY_LIST, [
            'pageNo' => 1,
            'pageSize' => 10,
            'time' => \Carbon\Carbon::parse($date)->format('Y-m-d'),
        ], 'POST')->json('data');
    }

    // public function getStationMonthEnergyList(): array
    // {
    //     return $this->client->post(Endpoints::STATION_MONTH_ENERGY_LIST, [], 'POST');
    // }

    public function getStationYearEnergyList(): array
    {
        return $this->client->post(Endpoints::STATION_YEAR_ENERGY_LIST, [], 'POST');
    }

    // public function getEpmList(): array
    // {
    //     return $this->client->post(Endpoints::EPM_LIST, [], 'POST');
    // }

    // public function getEpmDetaik(): array
    // {
    //     return $this->client->post(Endpoints::EPM_DETAIK, [], 'POST');
    // }

    // public function getEpmDay(): array
    // {
    //     return $this->client->post(Endpoints::EPM_DAY, [], 'POST');
    // }

    // public function getEpmMonth(): array
    // {
    //     return $this->client->post(Endpoints::EPM_MONTH, [], 'POST');
    // }

    // public function getEpmYear(): array
    // {
    //     return $this->client->post(Endpoints::EPM_YEAR, [], 'POST');
    // }

    // public function getEpmAll(): array
    // {
    //     return $this->client->post(Endpoints::EPM_ALL, [], 'POST');
    // }
}
