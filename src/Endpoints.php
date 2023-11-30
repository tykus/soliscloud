<?php

namespace Tykus\SolisCloud;

enum Endpoints: string
{
    case USER_STATIONS_LIST = '/v1/api/userStationList';
    
    case STATION_DETAIL = '/v1/api/stationDetail';
    case STATION_DETAIL_LIST = '/v1/api/stationDetailList';

    case COLLECTOR_LIST = '/v1/api/collectorList';
    case COLLECTOR_DETAIL = '/v1/api/collectorDetail';
    
    case INVERTER_LIST = '/v1/api/inverterList';
    case INVERTER_DETAIL = '/v1/api/inverterDetail';
    case INVERTER_DETAIL_LIST = '/v1/api/inverterDetailList';

    case STATION_DAY = '/v1/api/stationDay';
    case STATION_MONTH = '/v1/api/stationMonth';
    case STATION_YEAR = '/v1/api/stationYear';
    case STATION_ALL = '/v1/api/stationAll';

    case INVERTER_DAY = '/v1/api/inverterDay';
    case INVERTER_MONTH = '/v1/api/inverterMonth';
    case INVERTER_YEAR = '/v1/api/inverterYear';
    case INVERTER_ALL = '/v1/api/inverterAll';

    case ALARM_LIST = '/v1/api/alarmList';

    case STATION_DAY_ENERGY_LIST = '/v1/api/stationDayEnergyList';
    case STATION_MONTH_ENERGY_LIST = '/v1/api/stationMonthEnergyList';
    case STATION_YEAR_ENERGY_LIST = '/v1/api/stationYearEnergyList';

    case EPM_LIST = '/v1/api/epmList';
    case EPM_DETAIK = '/v1/api/epmDetail';
    case EPM_DAY = '/v1/api/epm/day';
    case EPM_MONTH = '/v1/api/epm/month';
    case EPM_YEAR = '/v1/api/epm/year';
    case EPM_ALL = '/v1/api/epm/all';
}
