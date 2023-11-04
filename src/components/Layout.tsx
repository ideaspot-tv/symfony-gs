import React, {ReactNode} from "react";
import Link from "next/link";

export default function Layout({children}: {
  children: ReactNode
}) {
  return (
    <>
      <nav className="navbar navbar-expand bg-dark border-bottom border-body" data-bs-theme="dark">
        <div className="container-fluid">
          <Link className="navbar-brand" href="/">Weather Forecasts</Link>

          <div className="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul className="navbar-nav">
              <li className="nav-item dropdown">
                <a className="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                   aria-expanded="false">
                  Locations
                </a>
                <ul className="dropdown-menu">
                  <li><Link className="dropdown-item" href="/weather/PL/Stettin">Stettin</Link></li>
                  <li><Link className="dropdown-item" href="/weather/ES/Barcelona">Barcelona</Link></li>
                  <li><Link className="dropdown-item" href="/weather/DE/Berlin">Berlin</Link></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div className="container">
        {children}
      </div>
    </>
  );
}
