import {ReactNode, useEffect} from "react";
import Layout from "@/components/Layout";
import {GetServerSideProps, GetServerSidePropsContext} from "next";

import styles from '@/styles/ForecastPage.module.css';

export const getServerSideProps: GetServerSideProps = async(context: GetServerSidePropsContext) => {
  const countryCode = context.params?.countryCode as string;
  const locationName = context.params?.locationName as string;

  const locations = await fetch(`http://localhost:3001/locations?country_code=${countryCode}&name=${locationName}`)
    .then((data) => data.json());
  const location = locations[0];

  const forecasts = await fetch(`http://localhost:3001/forecasts?location_id=${location.id}`)
    .then((data) => data.json());

  return {
    props: {
      countryCode,
      locationName,
      location,
      forecasts,
    }
  }
}

export default function ForecastPage({countryCode, locationName, location, forecasts}: {
  countryCode: string,
  locationName: string,
  location: any,
  forecasts: any,
}): ReactNode {

  useEffect(() => {
    // @ts-ignore
    var map = L.map('map').setView([location.latitude, location.longitude], 10);

    // @ts-ignore
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // @ts-ignore
    var marker = L.marker([location.latitude, location.longitude]).addTo(map);

    return () => {
      map.remove();
    };
  }, [location, location.latitude, location.longitude]);

  return (
    <Layout>
      <div className="row mt-3">
        <div className="col">
          <h1>Forecast for { location.name }, { location.country_code }</h1>
        </div>
      </div>

      <div className="row">
        <div className="col">
          <div id="map" className={`${styles.forecastCard}-card mt-3`} style={{height: '180px'}}></div>
        </div>
      </div>

      <div className="row forecasts mt-3">
        { forecasts && forecasts.length ? forecasts.map((forecast: any) => {
          const date = new Date(forecast.date);
          const dayOfWeek = date.toLocaleDateString('en-US', {weekday: 'long'});
          const shortDate = forecast.date.split('-').reverse().slice(0, 2).join('.');

          return (
            <div className="col-12 col-lg-6" key={forecast.date}>
              <div className={styles.forecastCard}>
                <div className="row">
                  <div className="forecast-card-header col-xs-12 d-flex justify-content-between align-items-center">
                    <div className={styles.day}>{ dayOfWeek }</div>
                    <div className="date">{ shortDate }</div>
                  </div>
                  <div className="forecast-card-general col-12 col-lg-6">
                    <div className="row">
                      <div className="col-6 text-center">
                        <i className={`bi-${ forecast.icon } ${styles.forecastIcon}`}></i>
                      </div>
                      <div className="col-6">
                        <div className={styles.temperature}>{ forecast.temperature_celsius }&deg;</div>
                        <div className="fl-temperature">Feels like { forecast.fl_temperature_celsius }&deg;</div>
                      </div>
                    </div>
                  </div>
                  <div className={`${styles.forecastCardDetails} col-12 col-lg-6 mt-3`}>
                    <dl>
                      <dt>Pressure</dt>
                      <dd>{ forecast.pressure }</dd>

                      <dt>Humidity</dt>
                      <dd>{ forecast.humidity }%</dd>

                      <dt>Wind</dt>
                      <dd>{ forecast.wind_speed } m/s</dd>

                      <dt>Cloudiness</dt>
                      <dd>{ forecast.cloudiness }%</dd>
                    </dl>
                  </div>

                </div>
              </div>
            </div>
          );
        }) : null }
      </div>
    </Layout>
  )
}


