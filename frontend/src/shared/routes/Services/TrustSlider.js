import React, { useEffect } from 'react';
import classes from './services.module.scss';

const TrustSlider = ({trusts}) => {
  useEffect(() => {
    if (window.Swiper) {
      new window.Swiper('.trustSwiper', {
        slidesPerView: 2,
        spaceBetween: 15,
        loop: true,
        pagination: {
          el: '.swiper-pagination',
        },
        navigation: {
          nextEl: '.servicePageTrust__nav .swiper-button-next',
          prevEl: '.servicePageTrust__nav .swiper-button-prev',
        },
        breakpoints: {
          800: {
            slidesPerView: 4,
            spaceBetween: 40,
          },
        }
      });
    }
  }, []);

  return (
    <div className={`swiper trustSwiper`}>
      <div className={`swiper-wrapper`}>
        {trusts.map((trust, i) => (
          <div key={i} className={`swiper-slide ${classes.servicePageTrust__slider_slide}`}><img src={trust.img}/></div>
        ))}
      </div>
    </div>
  );
};

export default TrustSlider