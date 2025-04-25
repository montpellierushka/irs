import React, { useEffect } from 'react';
import classes from './services.module.scss';

const ProjectSlider = () => {
  useEffect(() => {
    if (window.Swiper) {
      new window.Swiper('.projectSwiper', {
        slidesPerView: 1,
        spaceBetween: 15,
        loop: true,
        pagination: {
          el: '.swiper-pagination',
        },
        navigation: {
          nextEl: '.servicePageProjects__nav .swiper-button-next',
          prevEl: '.servicePageProjects__nav .swiper-button-prev',
        },
        breakpoints: {
          600: {
            slidesPerView: 2,
            spaceBetween: 28,
          },
        }
      });
    }
  }, []);

  return (
    <div className={`swiper projectSwiper`}>
      <div className={`swiper-wrapper`}>
        <div className={`swiper-slide ${classes.servicePageProjects__slider_slide}`}>
          <div>
            <h3>Снаб Креп НСК</h3>
            <p>Сайт производителя крепежа</p>
          </div>
          <img src="/img/services/snabkrep.jpg"/>
          </div>
        <div className={`swiper-slide ${classes.servicePageProjects__slider_slide}`}>
          <div>
            <h3>Экскалибур</h3>
            <p>Сайт производителя крепежа1</p>
          </div>
          <img src="/img/services/exalibur.jpg"/>
          </div>
        <div className={`swiper-slide ${classes.servicePageProjects__slider_slide}`}>
          <div>
            <h3>Снаб Креп НСК1</h3>
            <p>Сайт производителя крепежа2</p>
          </div>
          <img src="/img/services/snabkrep.jpg"/>
          </div>
      </div>
    </div>
  );
};

export default ProjectSlider